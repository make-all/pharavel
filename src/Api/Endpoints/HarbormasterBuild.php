<?php
namespace Pharavel\Api\Endpoints;

use Pharavel\Api\Phorge;

class HarbormasterBuild
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
     * Search for a build.
     *
     * @param array $params
     * @return array
     */
    public function search($params)
    {
        return $this->client->post('harbormaster.build.search', $params);
    }

    /**
     * Edit a build.
     *
     * @param array $params
     * @return array
     */
    public function edit($params)
    {
        return $this->client->post('harbormaster.build.edit', $params);
    }
}
