<?php
namespace Pharavel\Api\Endpoints;

use Pharavel\Api\Phorge;

class HarbormasterBuildplan
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
     * Search for a buildplan.
     *
     * @param array $params
     * @return array
     */
    public function search($params)
    {
        return $this->client->post('harbormaster.buildplan.search', $params);
    }

    /**
     * Edit a buildplan.
     *
     * @param array $params
     * @return array
     */
    public function edit($params)
    {
        return $this->client->post('harbormaster.buildplan.edit', $params);
    }
}
