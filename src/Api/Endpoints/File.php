<?php
namespace Pharavel\Api\Endpoints;

use Pharavel\Api\Phorge;

class File
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
     * Search for a file.
     *
     * @param array $params
     * @return array
     */
    public function search($params)
    {
        return $this->client->post('file.search', $params);
    }

    /**
     * Prepare to upload a file
     *
     * @param array $params
     * @return array
     */
    public function allocate($params)
    {
        return $this->client->post('file.allocate', $params);
    }

    /**
     * Download a file from the server
     *
     * @param array $params
     * @return array
     */
    public function download($params)
    {
        return $this->client->post('file.download', $params);
    }

    /**
     * Get information about file chunks
     *
     * @param array $params
     * @return array
     */
    public function queryChunks($params)
    {
        return $this->client->post('file.querychunks', $params);
    }

    /**
     * Upload a file to the server
     *
     * @param array $params
     * @return array
     */
    public function upload($params)
    {
        return $this->client->post('file.upload', $params);
    }

    /**
     * Upload a chunk of file data to the server
     *
     * @param array $params
     * @return array
     */
    public function uploadChunk($params)
    {
        return $this->client->post('file.uploadchunk', $params);
    }
}
