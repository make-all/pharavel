<?php

namespace Pharavel\Api;

use GuzzleHttp\Client;
use InvalidArgumentException;

use Pharavel\Api\Endpoints\Markup;
use Pharavel\Api\Endpoints\Project;
use Pharavel\Api\Endpoints\User;

class Phorge
{
    private $guzzle;
    private $token;

    public function __construct()
    {
        $this->guzzle = new Client([
            'base_uri' => config('app.phorge_url').'api/',
            'http_errors' => true,
        ]);
        $this->token = config('app.phorge_token');
    }

    /**
     * Get a named API endpoint.
     *
     * @param string $name
     * @throws InvalidArgumentException
     * @return ApiInterface
     */
    public function api($name)
    {
        switch($name)
        {
            case 'project':
                return new Project($this);
            case 'user':
                return new User($this);
            case 'remarkup':
                return new Markup($this);
            default:
                throw new InvalidArgumentException(sprintf('Undefined API called: %s', $name));
        }
    }

    public function post($func, $params)
    {
        $query = $params;
        $query['api.token'] = $this->token;
		$resp = $this->guzzle->post($func, ['query' => $query]);
        // TODO: error handling
        $result = json_decode($resp->getBody());
        if (isset($result->result))
            $result = $result->result;
        if (isset($result->data))
            $result = $result->data;
        return $result;
    }

    
	/**
     * Call an API function
     *
	 * @param string $name
	 * @throws InvalidArgumentException
	 * @return ApiInterface
	 */
	public function __call($name, $args)
	{
		return $this->api($name);
	}
}
