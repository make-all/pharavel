<?php
namespace Pharavel\Socialite;

use Laravel\Socialite\Two\ProviderInterface;
use SocialiteProviders\Manager\OAuth2\AbstractProvider;
use SocialiteProviders\Manager\OAuth2\User;

class Provider extends AbstractProvider implements ProviderInterface
{
    /**
     * Unique Provider Identifier.
     */
    const IDENTIFIER = 'Phorge';

    /**
     * {@inheritdoc}
     */
    protected $scopes = ['whoami'];

    protected $phorge_url;

    public function __construct()
    {
        $this->phorge_url = env('PHORGE_URL');
    }

    /**
     * {@inheritdoc}
     */
    protected function getAuthUrl($state)
    {
        return $this->buildAuthUrlFromBase($this->phorge_url.'oauthserver/auth/', $state);
    }

    /**
     * {@inheritdoc}
     */
    protected function getTokenUrl()
    {
        return $this->phorge_url.'oauthserver/token/';
    }

    /**
     * {@inheritdoc}
     */
    protected function getUserByToken($token)
    {
        $response = $this->getHttpClient()->get(
            $this->phorge_url.'api/user.whoami',
            [
                'query' => [
                    'access_token' => $token,
                ],
        ]);

        return json_decode($response->getBody(), true);
    }

    /**
     * {@inheritdoc}
     */
    protected function mapUserToObject(array $user)
    {
        return (new User())->setRaw($user)->map([
            'id'       => $user['result']['phid'],
            'nickname' => $user['result']['userName'],
            'name'     => $user['result']['realName'],
            'email'    => $user['result']['primaryEmail'],
            'avatar'   => $user['result']['image'],
        ]);
    }

    /**
     * {@inheritdoc}
     */
    protected function getTokenFields($code)
    {
        return array_merge(parent::getTokenFields($code), [
            'grant_type' => 'authorization_code'
        ]);
    }
}
