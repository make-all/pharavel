<?php
namespace Pharavel\Api\Endpoints;

use Pharavel\Api\Phorge;

class Project
{
    /**
     * The client
     * @var Pharavel\Api\Phorge
     */
    protected $client;

    public function __construct(Phorge $client)
    {
        $this->client = $client;
    }

    /**
     * Search for a project
     *
     * @param array $params
     * @return array
     */
    public function search($params)
    {
        return $this->client->post('project.search', $params);
    }

    public function edit($params)
    {
        return $this->client->post('project.edit', $params);
    }
}
