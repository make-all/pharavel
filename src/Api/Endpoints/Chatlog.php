<?php
namespace Pharavel\Api\Endpoints;

use Pharavel\Api\Phorge;

class Chatlog
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
     * Retrieve chatter
     *
     * @param array $params
     * @return array
     */
    public function query($params)
    {
        return $this->client->post('chatlog.query', $params);
    }

    /**
     * Record chatter
     *
     * @param array $params
     * @return array
     */
    public function record($params)
    {
        return $this->client->post('chatlog.record', $params);
    }
}
