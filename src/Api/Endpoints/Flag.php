<?php
namespace Pharavel\Api\Endpoints;

use Pharavel\Api\Phorge;

class Flag
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
     * Query flag markers.
     *
     * @param array $params
     * @return array
     */
    public function query($params)
    {
        return $this->client->post('flag.query', $params);
    }

    /**
     * Edit a flag
     *
     * @param array $params
     * @return array
     */
    public function edit($params)
    {
        return $this->client->post('flag.edit', $params);
    }

    /**
     * Clear a flag
     *
     * @param array $params
     * @return array
     */
    public function delete($params)
    {
        return $this->client->post('flag.delete', $params);
    }
}
