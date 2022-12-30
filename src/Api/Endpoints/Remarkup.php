<?php
namespace Pharavel\Api\Endpoints;

use Pharavel\Api\Phorge;

class Remarkup
{
    protected $client;

    public function __construct(Phorge $client)
    {
        $this->client = $client;
    }

    /**
     * Process text through remarkup.
     * @param array $params
     * @return array
     */
    public function process($params)
    {
        return $this->client->post('remarkup.process', $params);
    }

    /**
     * Convert Remarkup to HTML
     */
    public function html($markup)
    {
        $html = $this->process(['context' => 'feed', 'contents' => [$markup]]);
        $txt = '';
        foreach ($html as $h)
        {
            $txt .= $h->content;
        }
        return $txt;
    }
}
