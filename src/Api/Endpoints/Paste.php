<?php
namespace Pharavel\Api\Endpoints;

use Pharavel\Api\Phorge;

class Paste
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
     * Search for a paste.
     *
     * @param array $params
     * @return array
     */
    public function search($params)
    {
        return $this->client->post('paste.search', $params);
    }

    /**
     * Edit a paste
     *
     * @param array $params
     * @return array
     */
    public function edit($params)
    {
        return $this->client->post('paste.edit', $params);
    }
}
