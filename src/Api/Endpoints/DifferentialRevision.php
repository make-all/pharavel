<?php
namespace Pharavel\Api\Endpoints;

use Pharavel\Api\Phorge;

class DifferentialRevision
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
     * Edit a differential revision.
     *
     * @param array $params
     * @return array
     */
    public function edit($params)
    {
        return $this->client->post('differential.revision.edit', $params);
    }

    /**
     * Search for a differential revision.
     *
     * @param array $params
     * @return array
     */
    public function search($params)
    {
        return $this->client->post('differential.revision.search', $params);
    }
}
