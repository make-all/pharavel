<?php
namespace Pharavel\Api\Endpoints;

use Illuminate\Support\Facades\Auth;

use Pharavel\Api\Phorge;

class Project
{
    /**
     * The client
     * @var Pharavel\Api\Phorge
     */
    protected $client;

    public function __construct(Phorge $client)
    {
        $this->client = $client;
    }

    /**
     * Search for a project
     *
     * @param array $params
     * @return array
     */
    public function search($params)
    {
        return $this->client->post('project.search', $params);
    }

    public function edit($params)
    {
        return $this->client->post('project.edit', $params);
    }

    /**
     * Check if the current user is a member of the named project
     *
     * This assumes that the user nickname is the same as their username in
     * Phorge.  This assumption is valid if you use OAuth2 login from this
     * package, but if you use alternative login methods, you will need to
     * ensure that the usernames match.
     *
     * @param $project the name of the project to check
     */
    public function isMemberOf($project)
    {
        $uid = Auth::user()->nickname;
        $projects = $this->search(['constraints' => ['name' => $project, 'members' => [$uid]]]);
        return count($projects) > 0;
    }

    /**
     * Check if the current user is a member of the specified project
     *
     * This assumes that the user nickname is the same as their username in
     * Phorge.  This assumption is valid if you use OAuth2 login from this
     * package, but if you use alternative login methods, you will need to
     * ensure that the usernames match.
     *
     * @param $project the phid of the project to check
     */
    public function isMemberOfPhid($project)
    {
        $uid = Auth::user()->nickname;
        $projects = $this->search(["constraints" => ['phids' => [$project], 'members' => [$uid]]]);
        return is_array($projects) && count($projects) > 0;
    }
}
