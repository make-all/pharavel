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
                return new Endpoints\AlmanacBinding($this);
            case 'almanac.device':
                return new Endpoints\AlmanacDevice($this);
            case 'almanac.interface':
                return new Endpoints\AlmanacInterface($this);
            case 'almanac.namespace':
                return new Endpoints\AlmanacNamespace($this);
            case 'almanac.network':
                return new Endpoints\AlmanacNetwork($this);
            case 'almanac.service':
                return new Endpoints\AlmanacService($this);
            case 'auth':
                return new Endpoints\Auth($this);
            case 'badge':
                return new Endpoints\Badge($this);
            case 'calendar.event':
                return new Endpoints\CalendarEvent($this);
            case 'chatlog':
                return new Endpoints\Chatlog($this);
            case 'conduit':
                return new Endpoints\Conduit($this);
            case 'conpherence':
                return new Endpoints\Conpherence($this);
            case 'countdown':
                return new Endpoints\Countdown($this);
            case 'dashboard.panel':
                return new Endpoints\DashboardPanel($this);
            case 'differential.changeset':
                return new Endpoints\DifferentialChangeset($this);
            case 'differential.diff':
                return new Endpoints\DifferentialDiff($this);
            case 'differential.revision':
                return new Endpoints\DifferentialRevision($this);
            case 'differential':
                return new Endpoints\Differential($this);
            case 'diffusion.commit':
                return new Endpoints\DiffusionCommit($this);
            case 'diffusion.respository':
                return new Endpoints\DiffusionRepository($this);
            case 'diffusion.uri':
                return new Endpoints\DiffusionUri($this);
            case 'diffusion':
                return new Endpoints\Diffusion($this);
            case 'drydock.authorization':
                return new Endpoints\DrydockAuthorization($this);
            case 'drydock.blueprint':
                return new Endpoints\DrydockBlueprint($this);
            case 'drydock.lease':
                return new Endpoints\DrydockLease($this);
            case 'drydock.resource':
                return new Endpoints\DrydockResource($this);
            case 'edge':
                return new Endpoints\Edge($this);
            case 'feed':
                return new Endpoints\Feed($this);
            case 'file':
                return new Endpoints\File($this);
            case 'flag':
                return new Endpoints\Flag($this);
            case 'harbormaster.artifact':
                return new Endpoints\HarbormasterArtifact($this);
            case 'harbormaster.build':
                return new Endpoints\HarbormasterBuild($this);
            case 'harbormaster.buildable':
                return new Endpoints\HarbormasterBuildable($this);
            case 'harbormaster.buildplan':
                return new Endpoints\HarbormasterBuildplan($this);
            case 'harbormaster.log':
                return new Endpoints\HarbormasterLog($this);
            case 'harbormaster.step':
                return new Endpoints\HarbormasterStep($this);
            case 'harbormaster.target':
                return new Endpoints\HarbormasterTarget($this);
            case 'harbormaster':
                return new Endpoints\Harbormaster($this);
            case 'internal.commit':
                return new Endpoints\InternalCommit($this);
            case 'LegalpadDocument':
                return new Endpoints\LegalpadDocument($this);
            case 'LegalpadSignature':
                return new Endpoints\LegalpadSignature($this);
            case 'macro':
                return new Endpoints\Macro($this);
            case 'maniphest.priority':
                return new Endpoints\ManiphestPriority($this);
            case 'maniphest.status':
                return new Endpoints\ManiphestStatus($this);
            case 'maniphest':
                return new Endpoints\Maniphest($this);
            case 'owners':
                return new Endpoints\Owners($this);
            case 'packages.package':
                return new Endpoints\PackagesPackage($this);
            case 'packages.publisher':
                return new Endpoints\PackagesPublisher($this);
            case 'packages.version':
                return new Endpoints\PackagesVersion($this);
            case 'passphrase':
                return new Endpoints\Passphrase($this);
            case 'paste':
                return new Endpoints\Paste($this);
            case 'phame.blog':
                return new Endpoints\PhameBlog($this);
            case 'phame.post':
                return new Endpoints\PhamePost($this);
            case 'phequent':
                return new Endpoints\Phrequent($this);
            case 'phid':
                return new Endpoints\Phid($this);
            case 'phriction.content':
                return new Endpoints\PhrictionContent($this);
            case 'phriction.document':
                return new Endpoints\PhrictionDocument($this);
            case 'Phriction':
                return new Endpoints\Phriction($this);
            case 'phurls':
                return new Endpoints\Phurls($this);
            case 'portal':
                return new Endpoints\Portal($this);
            case 'project.column':
                return new Endpoints\ProjectColumn($this);
            case 'project':
                return new Endpoints\Project($this);
            case 'remarkup':
                return new Endpoints\Remarkup($this);
            case 'slowvote.poll':
                return new Endpoints\SlowvotePoll($this);
            case 'token':
                return new Endpoints\Token($this);
            case 'transaction':
                return new Endpoints\Transaction($this);
            case 'user':
                return new Endpoints\User($this);
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
