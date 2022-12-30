<?php
namespace Pharavel\Api\Endpoints;

use Pharavel\Api\Phorge;

class DifferentialChangeset
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
     * Search for a differential changeset.
     *
     * @param array $params
     * @return array
     */
    public function search($params)
    {
        return $this->client->post('differential.changeset.search', $params);
    }
}
