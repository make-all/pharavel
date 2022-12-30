<?php
namespace Pharavel\Api\Endpoints;

use Pharavel\Api\Phorge;

class ProjectColumn
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
     * Read information about workboard columns.
     *
     * @param array $params
     * @return array
     */
    public function search($params)
    {
        return $this->client->post('project.column.search', $params);
    }
}
