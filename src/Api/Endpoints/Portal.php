<?php
namespace Pharavel\Api\Endpoints;

use Pharavel\Api\Phorge;

class Portal
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
     * Search for portals.
     *
     * @param array $params
     * @return array
     */
    public function search($params)
    {
        return $this->client->post('portal.search', $params);
    }

    /**
     * Edit a portal
     *
     * @param array $params
     * @return array
     */
    public function edit($params)
    {
        return $this->client->post('portal.edit', $params);
    }
}
