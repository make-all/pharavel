<?php
namespace Pharavel\Api\Endpoints;

use Pharavel\Api\Phorge;

class Differential
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
     * Create a differential diff.
     *
     * @param array $params
     * @return array
     */
    public function createDiff($params)
    {
        return $this->client->post('differential.creatediff', $params);
    }

    /**
     * Add an inline comment to a differential diff.
     *
     * @param array $params
     * @return array
     */
    public function createInline($params)
    {
        return $this->client->post('differential.createinline', $params);
    }

    /**
     * Create a differential diff from a raw diff.
     *
     * @param array $params
     * @return array
     */
    public function createRawDiff($params)
    {
        return $this->client->post('differential.createrawdiff', $params);
    }

    /**
     * Retrieve differential commit messages or templates.
     *
     * @param array $params
     * @return array
     */
    public function getCommitMessage($params)
    {
        return $this->client->post('differential.getcommitmessage', $params);
    }

    /**
     * Query which paths should be included when commiting a differeatial revision.
     *
     * @param array $params
     * @return array
     */
    public function getCommitPaths($params)
    {
        return $this->client->post('differential.getcommitpaths', $params);
    }

    /**
     * Retrieve a raw diff.
     *
     * @param array $params
     * @return array
     */
    public function getRawDiff($params)
    {
        return $this->client->post('differential.getrawdiff', $params);
    }

    /**
     * Parse a commit message for differential fields.
     *
     * @param array $params
     * @return array
     */
    public function parseCommitMessage($params)
    {
        return $this->client->post('differential.parsecommitmessage', $params);
    }


    /**
     * Attach properties to differential diffs.
     *
     * @param array $params
     * @return array
     */
    public function setDiffProperty($params)
    {
        return $this->client->post('differential.setdiffproperty', $params);
    }
}
