<?php
namespace Pharavel\Api\Endpoints;

use Pharavel\Api\Phorge;

class Passphrase
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
     * Search for a passphrase.
     *
     * @param array $params
     * @return array
     */
    public function query($params)
    {
        return $this->client->post('passphrase.query', $params);
    }
}
