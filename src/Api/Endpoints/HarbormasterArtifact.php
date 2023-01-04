<?php
namespace Pharavel\Api\Endpoints;

use Pharavel\Api\Phorge;

class HarbormasterArtifact
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
     * Search for a artifact.
     *
     * @param array $params
     * @return array
     */
    public function search($params)
    {
        return $this->client->post('harbormaster.artifact.search', $params);
    }
}
