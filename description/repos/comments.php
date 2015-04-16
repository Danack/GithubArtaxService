<?php


return array(

    'listCommitCommentsRepo' => array(
        //## List commit comments for a repository
        //
        //Commit Comments use [these custom media types](#custom-media-types). You can
        //read more about the use of media types in the API [here](/v3/media/).
        //
        //Comments are ordered by ascending ID.
        //
        //    GET /repos/:owner/:repo/comments
        //
        //### Response
        //
        //== headers 200, :pagination => default_pagination_rels 
        //== json(:commit_comment) { |h| [h] }
    ),

    'listCommitComments' => array(
        ## List comments for a single commit
        
        //    GET /repos/:owner/:repo/commits/:ref/comments
        //
        //### Response
        //
        //== headers 200, :pagination => default_pagination_rels 
        //== json(:commit_comment) { |h| [h] } 
    ),

    'createCommitComment' => array(
        //## Create a commit comment
        //
        //    POST /repos/:owner/:repo/commits/:sha/comments
        //
        //### Input
        //
        //Name | Type | Description
        //-----|------|--------------
        //`body`|`string` | **Required**. The contents of the comment.
        //`path`|`string` | Relative path of the file to comment on.
        //`position`|`number` | Line index in the diff to comment on.
        //`line`|`number` | **Deprecated**. Use **position** parameter instead. Line number in the file to comment on.
        //
        //
        //#### Example
        //
        //== json \
        //  :body      => 'Nice change',
        //  :path      => 'file1.txt',
        //  :position  => 4,
        //  :line      => nil
        //
        //
        //### Response
        //
        //== headers 201, :Location => get_resource(:commit_comment)['url'] 
        //== json :commit_comment 
    ),

    'getCommitComment' => array(
        //## Get a single commit comment
        //
        //    GET /repos/:owner/:repo/comments/:id
        //
        //### Response
        //
        //== headers 200 
        //== json :commit_comment 
    ),
    
    'updateCommitComment' => array(
        //## Update a commit comment
        //
        //    PATCH /repos/:owner/:repo/comments/:id
        //
        //### Input
        //
        //Name | Type | Description
        //-----|------|--------------
        //`body`|`string` | **Required**. The contents of the comment
        //
        //
        //#### Example
        //
        //== json \
        //  :body => 'Nice change'
        //
        //
        //### Response
        //
        //== headers 200 
        //== json :commit_comment 
    ),
        
    'deleteCommitComment' => array(
        //## Delete a commit comment
        //
        //    DELETE /repos/:owner/:repo/comments/:id
        //
        //### Response
        //
        //== headers 204 
    ),

    //## Custom media types
    //
    //These are the supported media types for commit comments. You can read more
    //about the use of media types in the API [here](/v3/media/).
    //
    //    application/vnd.github-commitcomment.raw+json
    //    application/vnd.github-commitcomment.text+json
    //    application/vnd.github-commitcomment.html+json
    //    application/vnd.github-commitcomment.full+json
        
);