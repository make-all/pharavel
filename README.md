# Pharavel

Access Phorge (or Phabricator) resources from Laravel applications.

## Usage

Define the following variables in your .env file.

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
4. Set `PHORGE_CALLBACK_URL` in your .env to a callback URL within your application for accepting logins.
5. Add the following into app/Providers/EventServiceProvider.php

```
    protected $listen = [
        'SocialiteProviders\Manager\SocialiteWasCalled' => [
          'Pharavel\Socialite\PhorgeExtendSocialite@handle'
        ],
    ];
```
5. Add the following into config/services.php:

```
'phorge' => [
    'client_id' => env('PHORGE_CLIENT_ID'),
    'client_secret' => env('PHORGE_CLIENT_SECRET'),
    'redirect' => 'PHORGE_CALLBACK_URL',
],
```
where the redirect URL is replaced by a URL within your app to accept logins.

6. Add the two routes as described in https://laravel.com/docs/9.x/socialite#authentication (the callback is the same as the redirect URL above.

