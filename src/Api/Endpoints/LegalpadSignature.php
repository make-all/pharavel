<?php
namespace Pharavel\Api\Endpoints;

use Pharavel\Api\Phorge;

class LegalpadSignature
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
     * Read information about legalpad signatures.
     *
     * @param array $params
     * @return array
     */
    public function search($params)
    {
        return $this->client->post('legalpad.signature.search', $params);
    }
}
