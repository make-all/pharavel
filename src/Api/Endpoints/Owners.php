<?php
namespace Pharavel\Api\Endpoints;

use Pharavel\Api\Phorge;

class Owners
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
     * Search for a owners.
     *
     * @param array $params
     * @return array
     */
    public function search($params)
    {
        return $this->client->post('owners.search', $params);
    }

    /**
     * Edit a owners
     *
     * @param array $params
     * @return array
     */
    public function edit($params)
    {
        return $this->client->post('owners.edit', $params);
    }
}
