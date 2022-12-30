<?php
namespace Pharavel\Api\Endpoints;

use Pharavel\Api\Phorge;

class Conpherence
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
     * Edit a conpherence
     *
     * @param array $params
     * @return array
     */
    public function edit($params)
    {
        return $this->client->post('conpherence.edit', $params);
    }

    /**
     * Query for conpherence threads for the logged in user.
     */
    public function querythread($params)
    {
        return $this->client->post('conpherence.querythread', $params);
    }

    /**
     * Query for transactions for the logged in user within a room.
     */
    public function querytransaction($params)
    {
        return $this->client->post('conpherence.querytransaction', $params);
    }
}
