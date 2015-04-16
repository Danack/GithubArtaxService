<?php

return array(

        //---
        //title: Gist Comments | GitHub API
        //---
        //
        //# Comments
        //
        //* TOC
        //{:toc}
        //
        //Gist Comments use [these custom media types](#custom-media-types).
        //You can read more about the use of media types in the API
        //[here](/v3/media/).
        //
        //## List comments on a gist
        //
        //    GET /gists/:gist_id/comments
        //
        //### Response
        //
        //== headers 200, :pagination => default_pagination_rels 
        //== json(:gist_comment) { |h| [h] } 
        //
        //## Get a single comment
        //
        //    GET /gists/:gist_id/comments/:id
        //
        //### Response
        //
        //== headers 200 
        //== json :gist_comment 
        //
        //## Create a comment
        //
        //    POST /gists/:gist_id/comments
        //
        //### Parameters
        //
        //Name | Type | Description
        //-----|------|--------------
        //`body`|`string` | **Required**. The comment text.
        //
        //
        //== json :body => 'Just commenting for the sake of commenting' 
        //
        //### Response
        //
        //== headers 201, :Location => get_resource(:gist_comment)['url'] 
        //== json :gist_comment 
        //
        //## Edit a comment
        //
        //    PATCH /gists/:gist_id/comments/:id
        //
        //### Input
        //
        //Name | Type | Description
        //-----|------|--------------
        //`body`|`string` | **Required**. The comment text.
        //
        //
        //== json :body => 'Just commenting for the sake of commenting' 
        //
        //### Response
        //
        //== headers 200 
        //== json :gist_comment 
        //
        //## Delete a comment
        //
        //    DELETE /gists/:gist_id/comments/:id
        //
        //### Response
        //
        //== headers 204 
        //
        //## Custom media types
        //
        //These are the supported media types for gist comments. You can read more about the
        //use of media types in the API [here](/v3/media/).
        //
        //    application/vnd.github.VERSION.raw+json
        //    application/vnd.github.VERSION.text+json
        //    application/vnd.github.VERSION.html+json
        //    application/vnd.github.VERSION.full+json
);