<?php
namespace Pharavel\Api\Endpoints;

use Pharavel\Api\Phorge;

class DifferentialDiff
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
     * Search for a differential diff.
     *
     * @param array $params
     * @return array
     */
    public function search($params)
    {
        return $this->client->post('differential.diff.search', $params);
    }
}
