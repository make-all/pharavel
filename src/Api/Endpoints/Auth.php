<?php
namespace Pharavel\Api\Endpoints;

use Pharavel\Api\Phorge;

class Auth
{
    /**
     * The client
     */
    protected $client;

    public function __construct(Phorge $client)
    {
        $this->client = $client;
    }

    /**
     * Terminate all sessions.
     */
    public function logout()
    {
        return $this->client->post('auth.logout');
    }

    /**
     * Query public keys
     */
    public function queryPublicKeys($params)
    {
        return $this->client->post('auth.querypublickeys', $params);
    }
}
