<?php
namespace Pharavel\Api\Endpoints;

use Pharavel\Api\Phorge;

class Countdown
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
     * Search for a countdown.
     *
     * @param array $params
     * @return array
     */
    public function search($params)
    {
        return $this->client->post('countdown.search', $params);
    }

    /**
     * Edit a countdown
     *
     * @param array $params
     * @return array
     */
    public function edit($params)
    {
        return $this->client->post('countdown.edit', $params);
    }
}
