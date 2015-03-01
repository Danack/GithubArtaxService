<?php

//https://developer.github.com/v3/repos/contents/


//READMEs, files, and symlinks support the following custom media types:
//
//application/vnd.github.VERSION.raw
//application/vnd.github.VERSION.html
//Use the .raw media type to retrieve the contents of the file.
//
//For markup files such as Markdown or AsciiDoc, you can retrieve the rendered HTML using the .html media type. Markup languages are rendered to HTML using our open-source Markup library.


return array(

    //Get the README
    //https://developer.github.com/v3/repos/contents/#get-the-readme
    //GET /repos/:owner/:repo/readme
    //fixtures/data/github/repo/contents/getReadme.json
    //ref	string	The name of the commit/branch/tag. Default: the repository’s default branch (usually master)
    
    
// Get contents
// https://developer.github.com/v3/repos/contents/#get-contents
// GET /repos/:owner/:repo/contents/:path
// path	string	The content path.
// ref	string	The name of the commit/branch/tag. Default: the repository’s default branch (usually master)
// fixtures/data/github/repo/contents/get_contents.json


// Create a file
// https://developer.github.com/v3/repos/contents/#create-a-file
// PUT /repos/:owner/:repo/contents/:path
//path	string	Required. The content path.
//message	string	Required. The commit message.
//content	string	Required. The new file content, Base64 encoded.
//branch	string	The branch name. Default: the repository’s default branch (usually master)
//    Both the author and committer parameters have the same keys:
//
//Name	Type	Description
//name	string	The name of the author (or committer) of the commit
//email	string	The email of the author (or committer) of the commit


// Delete a file
// https://developer.github.com/v3/repos/contents/#delete-a-file
// DELETE /repos/:owner/:repo/contents/:path


// Get archive link
// https://developer.github.com/v3/repos/contents/#get-archive-link
// GET /repos/:owner/:repo/:archive_format/:ref
    'getArchiveLink' => array(
        'uri' => '/repos/{owner}/{repo}/{archive_format}/{ref}',
        'extends' => 'defaultGetOauthOperation',

        'summary' => 'This method will return a 302 to a URL to download a tarball or zipball archive for a repository. Please make sure your HTTP framework is configured to follow redirects or you will need to use the Location header to make a second GET request.',

        'parameters' => array(
            'owner' => array(
                "location" => "uri",
                'required' => 'true'
            ),
            'repo' => array(
                "location" => "uri",
                'required' => 'true'
            ),
            'archive_format' => array(
                "location" => "uri",
                'required' => 'true',
                'default' =>  'tarball',
                'description' => 'Can be either tarball or zipball. Default: tarball'
            ),
            'ref' => array(
                "location" => "uri",
                'required' => 'false',
                //A valid Git reference. Default: the repository’s default branch (usually master)
            ),
        ),
    ),
    
    //Update a file
    //https://developer.github.com/v3/repos/contents/#update-a-file
    'updateFile' => array(
        'extends' => 'defaultGetOauthOperation',
        'httpMethod' => 'PUT',
        'uri' => '/repos/{owner}/{repo}/contents/{path}',
        
        "responseClass" => 'GithubService\Model\Commits',
        'parameters' => array(
            'path' => array(
                'description' => 'The content path.',
                "location" => "uri",
            ),
            'owner' => array(
                "location" => "uri",
                'description' => '',
            ),
            'repo' => array(
                'description' => '',
                'type' => 'string'
            ),
            'content' => array(
                'description' => 'The updated file content, Base64 encoded.',
                'type' => 'string'
            ),
            'sha' => array(
                'description' => 'The blob SHA of the file being replaced.',
                'type' => 'string'
                //TODO - needs to be a function.
            ),
            'branch' => array(
                'description' => 'The branch name. Default: the repository’s default branch (usually master)',
                'type' => 'string'
            ),
            'message' => array(
                'description' => 'The commit message.',
                'type' => 'string'
            ),            
            'name' => array(
                'description' => 'The name of the author (or committer) of the commit',
                'type' => 'string',
                'optional' => 'true'
            ),
            'email' => array(
                'description' => 'The email of the author (or committer) of the commit',
                'type' => 'string',
                'optional' => 'true'
            ),
        ),
    ),
);