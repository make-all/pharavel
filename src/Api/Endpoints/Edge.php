<?php
namespace Pharavel\Api\Endpoints;

use Pharavel\Api\Phorge;

class Edge
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
     * Search for a edge.
     *
     * @param array $params
     * @return array
     */
    public function search($params)
    {
        return $this->client->post('edge.search', $params);
    }
}
