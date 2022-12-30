<?php
namespace Pharavel\Api\Endpoints;

use Pharavel\Api\Phorge;

class Phurls
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
     * Search for a phurl.
     *
     * @param array $params
     * @return array
     */
    public function search($params)
    {
        return $this->client->post('phurls.search', $params);
    }

    /**
     * Edit a phurl
     *
     * @param array $params
     * @return array
     */
    public function edit($params)
    {
        return $this->client->post('phurls.edit', $params);
    }
}
