<?php
namespace Pharavel\Api\Endpoints;

use Pharavel\Api\Phorge;

class AlmanacInterface
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
     * Search for an almanac interface.
     *
     * @param array $params
     * @return array
     */
    public function search($params)
    {
        return $this->client->post('almanac.interface.search', $params);
    }

    /**
     * Edit an almanac interface
     *
     * @param array $params
     * @return array
     */
    public function edit($params)
    {
        return $this->client->post('almanac.interface.edit', $params);
    }
}
