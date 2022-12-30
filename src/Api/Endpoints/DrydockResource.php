<?php
namespace Pharavel\Api\Endpoints;

use Pharavel\Api\Phorge;

class DrydockResource
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
     * Search for drydock resource info
     *
     * @param array $params
     * @return array
     */
    public function search($params)
    {
        return $this->client->post('drydock.resource.search', $params);
    }
}
