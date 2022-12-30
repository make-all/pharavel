<?php
namespace Pharavel\Api\Endpoints;

use Pharavel\Api\Phorge;

class Phid
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
     * Lookup objects by name.
     *
     * @param array $params
     * @return array
     */
    public function lookup($params)
    {
        return $this->client->post('phid.lookup', $params);
    }

    /**
     * Retrieve information by phids.
     *
     * @param array $params
     * @return array
     */
    public function query($params)
    {
        return $this->client->post('phid.query', $params);
    }
}
