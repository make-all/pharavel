<?php
namespace Pharavel\Api\Endpoints;

use Pharavel\Api\Phorge;

class PackagesVersion
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
     * Search for a version.
     *
     * @param array $params
     * @return array
     */
    public function search($params)
    {
        return $this->client->post('packages.version.search', $params);
    }

    /**
     * Edit a version
     *
     * @param array $params
     * @return array
     */
    public function edit($params)
    {
        return $this->client->post('packages.version.edit', $params);
    }
}
