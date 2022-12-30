<?php
namespace Pharavel\Api\Endpoints;

use Pharavel\Api\Phorge;

class Transaction
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
     * Search for a transaction.
     *
     * @param array $params
     * @return array
     */
    public function search($params)
    {
        return $this->client->post('transaction.search', $params);
    }
}
