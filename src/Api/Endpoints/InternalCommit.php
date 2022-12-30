<?php
namespace Pharavel\Api\Endpoints;

use Pharavel\Api\Phorge;

class InternalCommit
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
     * Read raw information about commits.
     *
     * @param array $params
     * @return array
     */
    public function search($params)
    {
        return $this->client->post('internal.commit.search', $params);
    }
}
