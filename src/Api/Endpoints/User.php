<?php
namespace Pharavel\Api\Endpoints;

use Pharavel\Api\Phorge;

class User
{
    /**
     * The client
     */
    protected $client;

    public function __construct(Phorge $client)
    {
        $this->client = $client;
    }

    public function whoAmI()
    {
        return $this->client->post('user.whoami');
    }
}
