<?php
namespace Pharavel\Api\Endpoints;

use Pharavel\Api\Phorge;

class Phrequent
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
     * Stop tracking time for an object.
     *
     * @param array $params
     * @return array
     */
    public function pop($params)
    {
        return $this->client->post('phrequent.pop', $params);
    }

    /**
     * Start tracking time for an object
     *
     * @param array $params
     * @return array
     */
    public function push($params)
    {
        return $this->client->post('phrequent.push', $params);
    }

    /**
     * Return objects currently having their time tracked.
     *
     * @param array $params
     * @return array
     */
    public function tracking($params)
    {
        return $this->client->post('phrequent.tracking');
    }
}
