<?php
namespace Pharavel\Api\Endpoints;

use Pharavel\Api\Phorge;

class Feed
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
     * Search for a feed.
     *
     * @param array $params
     * @return array
     */
    public function query($params)
    {
        return $this->client->post('feed.query', $params);
    }
}
