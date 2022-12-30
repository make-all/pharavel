<?php
namespace Pharavel\Api\Endpoints;

use Pharavel\Api\Phorge;

class SlowvotePoll
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
     * Search for a poll.
     *
     * @param array $params
     * @return array
     */
    public function search($params)
    {
        return $this->client->post('slowvote.poll.search', $params);
    }
}
