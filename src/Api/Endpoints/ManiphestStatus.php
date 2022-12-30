<?php
namespace Pharavel\Api\Endpoints;

use Pharavel\Api\Phorge;

class ManiphestStatus
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
     * Read information about task priorities.
     *
     * @param array $params
     * @return array
     */
    public function search($params)
    {
        return $this->client->post('maniphest.status.search', $params);
    }
}
