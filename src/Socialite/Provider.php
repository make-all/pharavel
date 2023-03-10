<?php
namespace Pharavel\Socialite;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use SocialiteProviders\Manager\OAuth2\AbstractProvider;
use Pharavel\Socialite\User;

class Provider extends AbstractProvider
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

    public function __construct(Request $request, $clientId, $clientSecret, $redirectUrl, $guzzle = [])
    {
        parent::__construct($request, $clientId, $clientSecret, $redirectUrl, $guzzle);
        $this->phorge_url = config('phorge.url');
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
        return Arr::get(json_decode($response->getBody(), true), 'result');
    }

    /**
     * {@inheritdoc}
     */
    protected function mapUserToObject(array $user)
    {
        return (new User())->setRaw($user)->map([
            'phid'      => $user['phid'],
            'nickname' => $user['userName'],
            'name'     => $user['realName'],
            'email'    => $user['primaryEmail'],
            'avatar'   => $user['image'],
            'roles'    => $user['roles'],
        ]);
    }
}
