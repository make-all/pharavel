<?php
namespace Pharavel\Api\Endpoints;

use Pharavel\Api\Phorge;

class Macro
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
     * Search for a macro.
     *
     * @param array $params
     * @return array
     */
    public function query($params)
    {
        return $this->client->post('macro.query', $params);
    }

    /**
     * Generate a meme.
     *
     * @param array $params
     * @return array
     */
    public function createMeme($params)
    {
        return $this->client->post('macro.creatememe', $params);
    }

    /**
     * Edit a macro
     *
     * @param array $params
     * @return array
     */
    public function edit($params)
    {
        return $this->client->post('macro.edit', $params);
    }
}
