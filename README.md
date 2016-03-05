## GithubArtaxService

A service description that is built to a usable service using ArtaxServiceBuilder


## Running web demo

There is a demo that can be run through the PHP builtin server. It's requires creating an application on Github, and then putting the Github client key/secret


1) Create a file called githubKey.php in the directory above this one (i.e. outside of the project root) which should contain the following details.


```php
<?php

define('GITHUB_USER_AGENT', 'YourApplicationName');
define('GITHUB_CLIENT_ID', '12345'); //The client ID associated with your Github application
define('GITHUB_CLIENT_SECRET', '123456789'); //The client secret associated with your Github application

```

2) From the command line, go to the test directory and run `php -S localhost:8000 -t web/`


The web server should now be available at http://localhost:8000/


Example web app
==============

This a trivial example of a web site that interacts with Github, to allow for interactive testing of the Oauth2 permissions generation - aka going to Github in a browser and giving the test app permission to retrieve info on your behalf.

From the command line, go to the test directory and run `php -S 0.0.0.0:80 -t example/`


The web server should now be available at http://localhost:8000/