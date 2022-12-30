<?php

namespace Pharavel\Api;

use GuzzleHttp\Client;
use InvalidArgumentException;

class Phorge
{
    private $guzzle;
    private $token;

    public function __construct()
    {
        $this->guzzle = new Client([
            'base_uri' => config('phorge.url').'api/',
            'http_errors' => true,
        ]);
        $this->token = config('phorge.token');
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
            case 'almanac.binding':
                return new Pharavel\Endpoints\AlmanacBinding($this);
            case 'almanac.device':
                return new Pharavel\Endpoints\AlmanacDevice($this);
            case 'almanac.interface':
                return new Pharavel\Endpoints\AlmanacInterface($this);
            case 'almanac.namespace':
                return new Pharavel\Endpoints\AlmanacNamespace($this);
            case 'almanac.network':
                return new Pharavel\Endpoints\AlmanacNetwork($this);
            case 'almanac.service':
                return new Pharavel\Endpoints\AlmanacService($this);
            case 'auth':
                return new Pharavel\Endpoints\Auth($this);
            case 'badge':
                return new Pharavel\Endpoints\Badge($this);
            case 'calendar.event':
                return new Pharavel\Endpoints\CalendarEvent($this);
            case 'chatlog':
                return new Pharavel\Endpoints\Chatlog($this);
            case 'conduit':
                return new Pharavel\Endpoints\Conduit($this);
            case 'conpherence':
                return new Pharavel\Endpoints\Conpherence($this);
            case 'countdown':
                return new Pharavel\Endpoints\Countdown($this);
            case 'dashboard.panel':
                return new Pharavel\Endpoints\DashboardPanel($this);
            case 'differential.changeset':
                return new Pharavel\Endpoints\DifferentialChangeset($this);
            case 'differential.diff':
                return new Pharavel\Endpoints\DifferentialDiff($this);
            case 'differential.revision':
                return new Pharavel\Endpoints\DifferentialRevision($this);
            case 'differential':
                return new Pharavel\Endpoints\Differential($this);
            case 'diffusion.commit':
                return new Pharavel\Endpoints\DiffusionCommit($this);
            case 'diffusion.respository':
                return new Pharavel\Endpoints\DiffusionRepository($this);
            case 'diffusion.uri':
                return new Pharavel\Endpoints\DiffusionUri($this);
            case 'diffusion':
                return new Pharavel\Endpoints\Diffusion($this);
            case 'drydock.authorization':
                return new Pharavel\Endpoints\DrydockAuthorization($this);
            case 'drydock.blueprint':
                return new Pharavel\Endpoints\DrydockBlueprint($this);
            case 'drydock.lease':
                return new Pharavel\Endpoints\DrydockLease($this);
            case 'drydock.resource':
                return new Pharavel\Endpoints\DrydockResource($this);
            case 'edge':
                return new Pharavel\Endpoints\Edge($this);
            case 'feed':
                return new Pharavel\Endpoints\Feed($this);
            case 'file':
                return new Pharavel\Endpoints\File($this);
            case 'flag':
                return new Pharavel\Endpoints\Flag($this);
            case 'harbormaster.artifact':
                return new Pharavel\Endpoints\HarbormasterArtifact($this);
            case 'harbormaster.build':
                return new Pharavel\Endpoints\HarbormasterBuild($this);
            case 'harbormaster.buildable':
                return new Pharavel\Endpoints\HarbormasterBuildable($this);
            case 'harbormaster.buildplan':
                return new Pharavel\Endpoints\HarbormasterBuildplan($this);
            case 'harbormaster.log':
                return new Pharavel\Endpoints\HarbormasterLog($this);
            case 'harbormaster.step':
                return new Pharavel\Endpoints\HarbormasterStep($this);
            case 'harbormaster.target':
                return new Pharavel\Endpoints\HarbormasterTarget($this);
            case 'harbormaster':
                return new Pharavel\Endpoints\Harbormaster($this);
            case 'internal.commit':
                return new Pharavel\Endpoints\InternalCommit($this);
            case 'LegalpadDocument':
                return new Pharavel\Endpoints\LegalpadDocument($this);
            case 'LegalpadSignature':
                return new Pharavel\Endpoints\LegalpadSignature($this);
            case 'macro':
                return new Pharavel\Endpoints\Macro($this);
            case 'maniphest.priority':
                return new Pharavel\Endpoints\ManiphestPriority($this);
            case 'maniphest.status':
                return new Pharavel\Endpoints\ManiphestStatus($this);
            case 'maniphest':
                return new Pharavel\Endpoints\Maniphest($this);
            case 'owners':
                return new Pharavel\Endpoints\Owners($this);
            case 'packages.package':
                return new Pharavel\Endpoints\PackagesPackage($this);
            case 'packages.publisher':
                return new Pharavel\Endpoints\PackagesPublisher($this);
            case 'packages.version':
                return new Pharavel\Endpoints\PackagesVersion($this);
            case 'passphrase':
                return new Pharavel\Endpoints\Passphrase($this);
            case 'paste':
                return new Pharavel\Endpoints\Paste($this);
            case 'phame.blog':
                return new Pharavel\Endpoints\PhameBlog($this);
            case 'phame.post':
                return new Pharavel\Endpoints\PhamePost($this);
            case 'phequent':
                return new Pharavel\Endpoints\Phrequent($this);
            case 'phid':
                return new Pharavel\Endpoints\Phid($this);
            case 'phriction.content':
                return new Pharavel\Endpoints\PhrictionContent($this);
            case 'phriction.document':
                return new Pharavel\Endpoints\PhrictionDocument($this);
            case 'Phriction':
                return new Pharavel\Endpoints\Phriction($this);
            case 'phurls':
                return new Pharavel\Endpoints\Phurls($this);
            case 'portal':
                return new Pharavel\Endpoints\Portal($this);
            case 'project.column":
                return new Pharavel\Endpoints\ProjectColumn($this);
            case 'project':
                return new Pharavel\Endpoints\Project($this);
            case 'remarkup':
                return new Pharavel\Endpoints\Remarkup($this);
            case 'slowvote.poll':
                return new Pharavel\Endpoints\SlowvotePoll($this);
            case 'token':
                return new Pharavel\Endpoints\Token($this);
            case 'transaction':
                return new Pharavel\Endpoints\Transaction($this);
            case 'user':
                return new Pharavel\Endpoints\User($this);
            default:
                throw new InvalidArgumentException(sprintf('Undefined API called: %s', $name));
        }
    }

    public function post($func, $params = [])
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
