<?php
namespace Pharavel\Api\Endpoints;

use Pharavel\Api\Phorge;

class Maniphest
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
     * Search for a task.
     *
     * @param array $params
     * @return array
     */
    public function search($params)
    {
        return $this->client->post('maniphest.search', $params);
    }

    /**
     * Edit a task
     *
     * @param array $params
     * @return array
     */
    public function edit($params)
    {
        return $this->client->post('maniphest.edit', $params);
    }
}
