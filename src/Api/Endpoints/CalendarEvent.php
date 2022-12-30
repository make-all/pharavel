<?php
namespace Pharavel\Api\Endpoints;

use Pharavel\Api\Phorge;

class CalendarEvent
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
     * Search for a event.
     *
     * @param array $params
     * @return array
     */
    public function search($params)
    {
        return $this->client->post('event.search', $params);
    }

    /**
     * Edit a event
     *
     * @param array $params
     * @return array
     */
    public function edit($params)
    {
        return $this->client->post('event.edit', $params);
    }
}
