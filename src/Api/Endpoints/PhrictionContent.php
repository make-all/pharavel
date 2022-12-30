<?php
namespace Pharavel\Api\Endpoints;

use Pharavel\Api\Phorge;

class PhrictionContent
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
     * Read information about document history .
     *
     * @param array $params
     * @return array
     */
    public function search($params)
    {
        return $this->client->post('phriction.content.search', $params);
    }
}
