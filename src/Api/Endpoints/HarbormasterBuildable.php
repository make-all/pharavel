<?php
namespace Pharavel\Api\Endpoints;

use Pharavel\Api\Phorge;

class HarbormasterBuildable
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
     * Search for a buildable.
     *
     * @param array $params
     * @return array
     */
    public function search($params)
    {
        return $this->client->post('harbormaster.buildable.search', $params);
    }

    /**
     * Edit a buildable.
     *
     * @param array $params
     * @return array
     */
    public function edit($params)
    {
        return $this->client->post('harbormaster.buildable.edit', $params);
    }
}
