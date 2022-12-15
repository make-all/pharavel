<?php
namespace Pharavel\Api\Endpoints;

use Pharavel\Api\Phorge;

class Markup
{
    protected $client;

    public function __construct(Phorge $client)
    {
        $this->client = $client;
    }

    /**
     * Convert Remarkup to HTML
     */
    public function html($markup)
    {
        $html = $this->client->post('remarkup.process', [
            'context' => 'feed', 'contents' => [$markup]
        ]);
        $txt = '';
        foreach ($html as $h)
        {
            $txt .= $h->content;
        }
        return $txt;
    }
}
