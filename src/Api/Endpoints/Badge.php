<?php
namespace Pharavel\Api\Endpoints;

use Pharavel\Api\Phorge;

class Badge
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
     * Search for a badge.
     *
     * @param array $params
     * @return array
     */
    public function search($params)
    {
        return $this->client->post('badge.search', $params);
    }

    /**
     * Edit a badge
     *
     * @param array $params
     * @return array
     */
    public function edit($params)
    {
        return $this->client->post('badge.edit', $params);
    }
}
