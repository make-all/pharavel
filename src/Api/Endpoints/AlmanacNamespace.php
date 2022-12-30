<?php
namespace Pharavel\Api\Endpoints;

use Pharavel\Api\Phorge;

class AlmanacNamespace
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
     * Search for an almanac namespace.
     *
     * @param array $params
     * @return array
     */
    public function search($params)
    {
        return $this->client->post('almanac.namespace.search', $params);
    }

    /**
     * Edit an almanac namespace
     *
     * @param array $params
     * @return array
     */
    public function edit($params)
    {
        return $this->client->post('almanac.namespace.edit', $params);
    }
}
