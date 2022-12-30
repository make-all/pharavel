<?php
namespace Pharavel\Api\Endpoints;

use Pharavel\Api\Phorge;

class Phriction
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
     * Create a phriction document.
     *
     * @param array $params
     * @return array
     */
    public function create($params)
    {
        return $this->client->post('phriction.create', $params);
    }

    /**
     * Edit a phriction document
     *
     * @param array $params
     * @return array
     */
    public function edit($params)
    {
        return $this->client->post('phriction.edit', $params);
    }
}
