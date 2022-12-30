<?php
namespace Pharavel\Api\Endpoints;

use Pharavel\Api\Phorge;

class Diffusion
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
     * Get blame information for a list of paths.
     *
     * @param array $params
     * @return array
     */
    public function blame($params)
    {
        return $this->client->post('diffusion.blame', $params);
    }

    /**
     * List which branches exist for a repository
     *
     * @param array $params
     * @return array
     */
    public function branchQuery($params)
    {
        return $this->client->post('diffusion.branchquery', $params);
    }
    
    /**
     * Get commit ids for a commit's parents
     *
     * @param array $params
     * @return array
     */
    public function commitParentsQuery($params)
    {
        return $this->client->post('diffusion.commitparentsquery', $params);
    }

    /**
     * Get diff information for a path within a commit
     *
     * @param array $params
     * @return array
     */
    public function diffQuery($params)
    {
        return $this->client->post('diffusion.diffquery', $params);
    }

    /**
     * Determine if code exists in a version control system
     *
     * @param array $params
     * @return array
     */
    public function existsQuery($params)
    {
        return $this->client->post('diffusion.existsquery', $params);
    }

    /**
     * Retrieve file content from a repository
     *
     * @param array $params
     * @return array
     */
    public function fileContentQuery($params)
    {
        return $this->client->post('diffusion.filecontentquery', $params);
    }

    /**
     * Retrieve diffusion symbol information
     *
     * @param array $params
     * @return array
     */
    public function findSymbols($params)
    {
        return $this->client->post('diffusion.findsymbols', $params);
    }

    /**
     * Return history information
     *
     * @param array $params
     * @return array
     */
    public function historyQuery($params)
    {
        return $this->client->post('diffusion.historyquery', $params);
    }

    /**
     * Get commits a which paths were last modified.
     *
     * @param array $params
     * @return array
     */
    public function lastModifiedQuery($params)
    {
        return $this->client->post('diffusion.lastmodifiedquery', $params);
    }

    /**
     * Merged commit information
     *
     * @param array $params
     * @return array
     */
    public function mergedCommitsQuery($params)
    {
        return $this->client->post('diffusion.mergedcommitsquery', $params);
    }

    /**
     * Filename search within a repository
     *
     * @param array $params
     * @return array
     */
    public function queryPaths($params)
    {
        return $this->client->post('diffusion.querypaths', $params);
    }

    /**
     * Get raw diff information
     *
     * @param array $params
     * @return array
     */
    public function rawDiffQuery($params)
    {
        return $this->client->post('diffusion.rawdiffquery', $params);
    }

    /**
     * Get ref information
     *
     * @param array $params
     * @return array
     */
    public function refsQuery($params)
    {
        return $this->client->post('diffusion.refsquery', $params);
    }

    /**
     * Resolve references into stable, canonical identifiers
     *
     * @param array $params
     * @return array
     */
    public function resolveRefs($params)
    {
        return $this->client->post('diffusion.resolverefs', $params);
    }

    /**
     * Search a repository
     *
     * @param array $params
     * @return array
     */
    public function searchQuery($params)
    {
        return $this->client->post('diffusion.searchquery', $params);
    }

    /**
     * Get tags information
     *
     * @param array $params
     * @return array
     */
    public function tagsQuery($params)
    {
        return $this->client->post('diffusion.tagsquery', $params);
    }

    /**
     * Get lint messages for existing code
     *
     * @param array $params
     * @return array
     */
    public function getLintMessages($params)
    {
        return $this->client->post('diffusion.getlintmessagess', $params);
    }

    /**
     * Advise the server to look for commits in a repository ASAP.
     *
     * @param array $params
     * @return array
     */
    public function lookSoon($params)
    {
        return $this->client->post('diffusion.looksoon', $params);
    }

    /**
     * Publish coverage information for a repository
     *
     * @param array $params
     * @return array
     */
    public function updateCoverage($params)
    {
        return $this->client->post('diffusion.updatecoverage', $params);
    }
}
