<?php
namespace Pharavel\Api\Endpoints;

use Pharavel\Api\Phorge;

class PhamePost
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
     * Search for a post.
     *
     * @param array $params
     * @return array
     */
    public function search($params)
    {
        return $this->client->post('phame.post.search', $params);
    }

    /**
     * Edit a post
     *
     * @param array $params
     * @return array
     */
    public function edit($params)
    {
        return $this->client->post('phame.post.edit', $params);
    }
}
