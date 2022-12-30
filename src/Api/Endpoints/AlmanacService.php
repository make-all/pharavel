<?php
namespace Pharavel\Api\Endpoints;

use Pharavel\Api\Phorge;

class AlmanacService
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
     * Search for an almanac service.
     *
     * @param array $params
     * @return array
     */
    public function search($params)
    {
        return $this->client->post('almanac.service.search', $params);
    }

    /**
     * Edit an almanac service
     *
     * @param array $params
     * @return array
     */
    public function edit($params)
    {
        return $this->client->post('almanac.service.edit', $params);
    }
}
