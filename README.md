# Pharavel

Access Phorge (or Phabricator) resources from Laravel applications.

Currently this provides minimal access to the Conduit API, focused on
the use case of authentication and authorization of users based on
project membership.


## Usage

1. Define the following variables in your .env file.

- PHORGE_URL = the base URL of your Phorge or Phabricator installation
- PHORGE_TOKEN = a Conduit API token for a Bot account that has the required access to the objects you want to work with.

## Supported APIs

The full modern Phorge Conduit API as at December 2022 is supported.  Frozen
APIs are not supported, as there are modern API replacements for those.
Non-frozen legacy API functions without modern replacements are generally
supported.

As an example, the search and edit functions of project are supported as:

### Project

#### project.search
Project.search($params) - searches for projects based on $params.
    $params is an associative array of name value pairs, as described in the
    conduit documentation.
    Return value is a list of matching objects.

#### project.edit
Project.edit($params) - edits a project with $params.
    $params is an associative array of name value pairs, as described in the
    conduit documentation.  Specify "objectIdentifier" to edit an existing
    project, otherwise a new project will be created using the parameters.
    Return value contains the phids of objects affected.

## Convenience API functions

Some convenience functions have been added that wrap API functions with
some parameters already provided, and the normal single array map parameter
replaced by more natural parameters.

### Remarkup

#### Remarkup.html($text)

remarkup.process with context set to feed (so not application specific)
and the `$text` provided will be sent as contents.  Return value will be
a string containing html.

### Project

#### Project.isMemberOf($project)

project.search which takes a username from the logged in user's nickname
attribute (if you are using OAuth2 login from this package, then this will be
populated with the user id), and does a search of projects with the name
`$project` that have that user as a member.

#### Project.isMemberOfPhid($phid)

as above, but takes a phid instead of a name for the project to check.  This
should provide a more stable result than the above, as the name is editable
while the phid is not, so is guaranteed not to change over time.

## Using Oauth2 authentication from Phorge

To use Oauth2 to authenticate your app using your Phorge installation,
the following steps are required.

1. Set `PHORGE_URL` in your .env as above

2. Set `PHORGE_CLIENT_ID` in your .env to the client id you have registered in Phorge for this app

3. Set `PHORGE_CLIENT_SECRET` in your .env to the corresponding secret for your app.

4. Add the following into app/Providers/EventServiceProvider.php

```php
...

    protected $listen = [
        'SocialiteProviders\Manager\SocialiteWasCalled' => [
          'Pharavel\Socialite\PhorgeExtendSocialite@handle'
        ],
    ];

...
```

5. Add the following into app/Providers/AppServiceProvider.php

```php
use Laravel\Socialite\Contracts\Factory;
use Pharavel\Socialite\Provider as PhorgeSocialiteProvider

...

    public function boot()
    {
        $socialite = $this->app->make(Factory::class);

        $socialite->extend('phorge', function() use ($socialite) {
            $config = config('services.phorge');
            return $socialite->buildProvider(PhorgeSocialiteProvider::class, $config);
        });
    }

...
```

6. Routes for `/auth/phorge/redirect` and `/auth/phorge/callback` are predefined
   by this package.  For convenience, the redirect route has a name
   of "phorgeLogin" predefined so you can link a "Login with Phorge" button
   to it easily. If you want automatic login (always via Phorge, no other
   authentication methods), then you should define a route with a
   name of "login" assigned, using the redirectToPhorge method of
   Pharavel\Socialite\LoginController.

```php
use Pharavel\Socialite\LoginController;

...

Route::get('/auth/redirect', [LoginController::class, 'redirectToPhorge']);

```


This should give you login via Phorge.  When any page is accessed that
requires "auth" middleware, you will be redirected to Phorge where you
will be shown a prompt that your app wants to use Phorge credentials.
The first connection will be a bit more detailed in asking for
permission.  After clicking through, the Phorge User will be available
as Auth:user(), with attributes nickname (user id), name (full name),
email, avatar (URL to image), phid (phid of user).

The phid in particular can be useful for use in Guards, using the API
above to check project membership.
