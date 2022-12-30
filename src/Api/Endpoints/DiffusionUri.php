<?php
namespace Pharavel\Api\Endpoints;

use Pharavel\Api\Phorge;

class DiffusionUri
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
     * Edit a URI
     *
     * @param array $params
     * @return array
     */
    public function edit($params)
    {
        return $this->client->post('diffusion.uri.edit', $params);
    }
}
