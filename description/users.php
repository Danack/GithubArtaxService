<?php

//https://developer.github.com/v3/users/
//Get a single user
//Get the authenticated user
//Update the authenticated user
//Get all users


return array(

    //Get a single user
    //https://developer.github.com/v3/users/#get-a-single-user
    'getUserInfoByName' => [
        'extends' => 'defaultGetOauthOperation',
        'uri' => '/users/{username}',
        'responseClass' => 'GithubService\Model\User',
        'parameters' => array(
            'username' => array(
                "location" => "uri",
                "description" => "The username of the client.",
            ),
        ),
    ],

    //Get the authenticated user
    //https://developer.github.com/v3/users/#get-the-authenticated-user
    'getUserInfo' => [
        'extends' => 'defaultGetOauthOperation',
        'uri' => '/user',
        'responseClass' => 'GithubService\Model\User',
    ],


    //Update the authenticated user
    //https://developer.github.com/v3/users/#update-the-authenticated-user
    //PATCH /user
//    name	string	The new name of the user
//    email	string	Publicly visible email address.
//    blog	string	The new blog URL of the user.
//    company	string	The new company of the user.
//    location	string	The new location of the user.
//    hireable	boolean	The new hiring availability of the user.
//    bio	string	The new short biography of the user.


//    Get all users
//    https://developer.github.com/v3/users/#get-all-users
//    GET /users
    //since	string	The integer ID of the last User that you’ve seen.




);