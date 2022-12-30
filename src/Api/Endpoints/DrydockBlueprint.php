<?php
namespace Pharavel\Api\Endpoints;

use Pharavel\Api\Phorge;

class DrydockBlueprint
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
     * Search for drydock blueprint info
     *
     * @param array $params
     * @return array
     */
    public function search($params)
    {
        return $this->client->post('drydock.blueprint.search', $params);
    }

    /**
     * Edit a drydock blueprint
     *
     * @param array $params
     * @return array
     */
    public function edit($params)
    {
        return $this->client->post('drydock.blueprint.edit', $params);
    }
}
