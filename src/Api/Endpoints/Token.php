<?php
namespace Pharavel\Api\Endpoints;

use Pharavel\Api\Phorge;

class Token
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
     * Give a token.
     *
     * @param array $params
     * @return array
     */
    public function give($params)
    {
        return $this->client->post('token.give', $params);
    }

    /**
     * Query tokens given to objects
     *
     * @param array $params
     * @return array
     */
    public function given($params)
    {
        return $this->client->post('token.given', $params);
    }

    /**
     * Query tokens
     *
     * @param array $params
     * @return array
     */
    public function query($params)
    {
        return $this->client->post('token.query', $params);
    }
}
