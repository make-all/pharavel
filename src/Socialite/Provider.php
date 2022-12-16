<?php
namespace Pharavel\Socialite;

use Illuminate\Http\Request;
use Laravel\Socialite\Two\AbstractProvider;
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
        $json = json_decode($response->getBody(), true);
        \Log::debug("$token: ".print_r($json, true));
        return $json;
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
}
