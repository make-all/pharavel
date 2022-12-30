<?php
namespace Pharavel\Api\Endpoints;

use Pharavel\Api\Phorge;

class DrydockAuthorization
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
     * Search for drydock authorization info
     *
     * @param array $params
     * @return array
     */
    public function search($params)
    {
        return $this->client->post('drydock.authorization.search', $params);
    }
}
