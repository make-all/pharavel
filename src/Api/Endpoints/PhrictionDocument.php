<?php
namespace Pharavel\Api\Endpoints;

use Pharavel\Api\Phorge;

class PhrictionDocument
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
     * Read information about documents.
     *
     * @param array $params
     * @return array
     */
    public function search($params)
    {
        return $this->client->post('phriction.document.search', $params);
    }
}
