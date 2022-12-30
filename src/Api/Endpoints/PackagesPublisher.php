<?php
namespace Pharavel\Api\Endpoints;

use Pharavel\Api\Phorge;

class PackagesPublisher
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
     * Search for a publisher.
     *
     * @param array $params
     * @return array
     */
    public function search($params)
    {
        return $this->client->post('packages.publisher.search', $params);
    }

    /**
     * Edit a publisher
     *
     * @param array $params
     * @return array
     */
    public function edit($params)
    {
        return $this->client->post('packages.publisher.edit', $params);
    }
}
