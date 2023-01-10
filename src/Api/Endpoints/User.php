<?php
namespace Pharavel\Api\Endpoints;

use Pharavel\Api\Phorge;

class User
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
     * Search for a user.
     *
     * @param array $params
     * @return array
     */
    public function search($params)
    {
        return $this->client->post('user.search', $params);
    }

    /*
     * user.edit is available in conduit, but of limited use, as users in
     * Phorge are limited to editing their own details (ie the API token owner).
     */

    /**
     * Return information about the token owner.
     *
     * This is of limited use due to the fact that the user that owns the
     * API token is the one authenticated for the API.
     * Unlike most methods, this one will also work with a session token
     * instead of an api token, but to use it like that, you should use
     * auth()->user() after authenticating with OAuth2 using this package's
     * Socialite provider.
     *
     * Other than the email address, the information should be the same as
     * returned by user.search.
     */
    public function whoAmI()
    {
        return $this->client->post('user.whoami');
    }

    /**
     * Query users.  DEPRECATED.
     *
     * Although this is a deprecated method, replaced by search, it allows
     * querying users by email address, which search does not.
     * Depending on context, this may be the piece of info we have already
     * in the external application that identifies the user.
     */
    public function query($params)
    {
        return $this->client->post('user.query', $params);
    }
}
