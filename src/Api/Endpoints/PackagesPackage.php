<?php
namespace Pharavel\Api\Endpoints;

use Pharavel\Api\Phorge;

class PackagesPackage
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
     * Search for a package.
     *
     * @param array $params
     * @return array
     */
    public function search($params)
    {
        return $this->client->post('packages.package.search', $params);
    }

    /**
     * Edit a package
     *
     * @param array $params
     * @return array
     */
    public function edit($params)
    {
        return $this->client->post('packages.package.edit', $params);
    }
}
