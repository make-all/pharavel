<?php
namespace Pharavel\Api\Endpoints;

use Pharavel\Api\Phorge;

class DiffusionCommit
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
     * Search for a commit.
     *
     * @param array $params
     * @return array
     */
    public function search($params)
    {
        return $this->client->post('diffusion.commit.search', $params);
    }

    /**
     * Edit a commit
     *
     * @param array $params
     * @return array
     */
    public function edit($params)
    {
        return $this->client->post('diffusion.commit.edit', $params);
    }
}
