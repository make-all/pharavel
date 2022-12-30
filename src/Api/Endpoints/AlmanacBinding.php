<?php
namespace Pharavel\Api\Endpoints;

use Pharavel\Api\Phorge;

class AlmanacBinding
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
     * Search for an almanac binding.
     *
     * @param array $params
     * @return array
     */
    public function search($params)
    {
        return $this->client->post('almanac.binding.search', $params);
    }

    /**
     * Edit an almanac binding
     *
     * @param array $params
     * @return array
     */
    public function edit($params)
    {
        return $this->client->post('almanac.binding.edit', $params);
    }
}
