<?php
namespace Pharavel\Api\Endpoints;

use Pharavel\Api\Phorge;

class Harbormaster
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
     * Create a harbormaster artifact.
     *
     * @param array $params
     * @return array
     */
    public function createArtifact($params)
    {
        return $this->client->post('harbormaster.createartifact', $params);
    }

    /**
     * Query harbormaster auto targets
     *
     * @param array $params
     * @return array
     */
    public function queryAutoTargets($params)
    {
        return $this->client->post('harbormaster.queryautotargets', $params);
    }

    /**
     * Query harbormaster buildables
     *
     * @param array $params
     * @return array
     */
    public function queryBuildables($params)
    {
        return $this->client->post('harbormaster.queryautotargets', $params);
    }

    /**
     * Modify running builds and report build results
     *
     * @param array $params
     * @return array
     */
    public function sendMessage($params)
    {
        return $this->client->post('harbormaster.sendmessage', $params);
    }
}
