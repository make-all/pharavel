<?php
namespace Pharavel\Api\Endpoints;

use Pharavel\Api\Phorge;

class DashboardPanel
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
     * Edit a dashboard panel
     *
     * @param array $params
     * @return array
     */
    public function edit($params)
    {
        return $this->client->post('dashboard.panel.edit', $params);
    }
}
