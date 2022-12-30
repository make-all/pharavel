<?php
namespace Pharavel\Api\Endpoints;

use Pharavel\Api\Phorge;

class PhameBlog
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
     * Search for a blog.
     *
     * @param array $params
     * @return array
     */
    public function search($params)
    {
        return $this->client->post('phame.blog.search', $params);
    }

    /**
     * Edit a blog
     *
     * @param array $params
     * @return array
     */
    public function edit($params)
    {
        return $this->client->post('phame.blog.edit', $params);
    }
}
