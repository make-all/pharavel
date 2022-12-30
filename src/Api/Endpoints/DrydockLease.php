<?php
namespace Pharavel\Api\Endpoints;

use Pharavel\Api\Phorge;

class DrydockLease
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
     * Search for drydock lease info
     *
     * @param array $params
     * @return array
     */
    public function search($params)
    {
        return $this->client->post('drydock.lease.search', $params);
    }
}
