<?php


//https://developer.github.com/v3/users/emails/
//List email addresses for a user
//Add email address(es)
//Delete email address(es)

return array(

    //List email addresses for a user
    //https://developer.github.com/v3/users/emails/#list-email-addresses-for-a-user
    "getUserEmails" => array(
        "uri" => "https://api.github.com/user/emails",
        'extends' => 'defaultGetOauthOperation',
        'summary' => 'Get users email addresses',
        'responseClass' => 'GithubService\Model\Emails',
        'httpMethod' =>  'GET',
        'parameters' => array(
            //No parameters - it works off the oauth bearer token
        ),
    ),

    //Add email address(es)
    //https://developer.github.com/v3/users/emails/#add-email-addresses
    "addUserEmails" => array(
        "uri" => "https://api.github.com/user/emails",
        'extends' => 'defaultGetOauthOperation',
        'summary' => 'Get users email addresses',
        //TODO - It would be better to have scopes and permissions combined?
        'scopes' => [
            ['user']// [\GithubService\Github::SCOPE_USER],
        ],

        'responseClass' => 'GithubService\Model\Emails',
        'httpMethod' =>  'POST',
        'parameters' => array(
            'emails' => array(
                "location" => "json",
                "description" => "Array of the emails to add",
            ),
        ),
    ),


    //Delete email address(es)
    //https://developer.github.com/v3/users/emails/#delete-email-addresses
    //DELETE /user/emails

);

 