<?php
namespace Pharavel\Api\Endpoints;

use Pharavel\Api\Phorge;

class HarbormasterStep
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
     * Search for a step.
     *
     * @param array $params
     * @return array
     */
    public function search($params)
    {
        return $this->client->post('harbormaster.step.search', $params);
    }

    /**
     * Edit a step.
     *
     * @param array $params
     * @return array
     */
    public function edit($params)
    {
        return $this->client->post('harbormaster.step.edit', $params);
    }
}
