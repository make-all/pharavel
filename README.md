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

### User

#### user.whoami
User->whoAmI() - returns the details of the user owning the token.
    Return value contains information about the user.  Since this
    is always the user that owns the API token, it is probably only
    useful for testing the API configuration (since this function does
    not need any parameters)

### Project

#### project.search
Project.search(params) - searches for projects based on params.
    params is an associative array of name value pairs, as described in the
    conduit documentation.
    Return value is a list of matching objects.

#### project.edit
Project.edit(params) - edits a project with params.
    params is an associated array of name value pairs, as described in the
    conduit documentation.  Specify "objectIdentifier" to edit an existing
    project, otherwise a new project will be created using the parameters.
    Return value contains the phids of objects affected.

### Markup

#### remarkup.process
Markup.html(text) - convert remarkup text to html.
    text is a string containing the content to convert to html.
    Return value is a string containing html.

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
   to it. If you want automatic login (always via Phorge, no other
   authentication methods), then you should define a login route with a
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
