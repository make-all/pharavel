<?php
namespace Pharavel\Api\Endpoints;

use Pharavel\Api\Phorge;

class AlmanacDevice
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
     * Search for an almanac device.
     *
     * @param array $params
     * @return array
     */
    public function search($params)
    {
        return $this->client->post('almanac.device.search', $params);
    }

    /**
     * Edit an almanac device
     *
     * @param array $params
     * @return array
     */
    public function edit($params)
    {
        return $this->client->post('almanac.device.edit', $params);
    }
}
