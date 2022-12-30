<?php
namespace Pharavel\Api\Endpoints;

use Pharavel\Api\Phorge;

class HarbormasterLog
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
     * Search for a log.
     *
     * @param array $params
     * @return array
     */
    public function search($params)
    {
        return $this->client->post('harbormaster.log.search', $params);
    }
}
