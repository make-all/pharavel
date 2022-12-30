<?php
namespace Pharavel\Api\Endpoints;

use Pharavel\Api\Phorge;

class Conduit
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
     * Connect a session based client.
     */
    public function connect($params)
    {
        return $this->client->post('conduit.connect', $params);
    }

    /**
     * List the capabilities of the server.
     */
    public function getcapabilities($params)
    {
        return $this->client->post('conduit.getcapabilities', $params);
    }

    /**
     * Retrieve the certificate information for a user.
     */
    public function getcertificate($param)
    {
        return $this->client->post('conduit.getcertificate', $params);
    }

    /**
     * ping the server.
     */
    public function ping()
    {
        return $this->client->post('conduit.ping');
    }

    /**
     * List the supported commands and their parameters.
     */
    public function query()
    {
        return $this->client->post('conduit.query');
    }
}
