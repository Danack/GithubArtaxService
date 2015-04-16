<?php

return array(

//The Pages API retrieves information about your GitHub Pages configuration, and
//the statuses of your builds. Information about the site and the builds can only be
//accessed by authenticated owners, even though the websites are public.
//
//In JSON responses, `status` can be one of:
//
//* `null`, which means the site has yet to be built
//* `building`, which means the build is in progress
//* `built`, which means the site has been built
//* `errored`, which indicates an error occurred during the build

    'getPagesInfo' => array(
        //## Get information about a Pages site
        //
        //    GET /repos/:owner/:repo/pages
        //
        //### Response
        //
        //== headers 200 
        //== json(:pages)
    ), 
    'listPagesBuilds' => array(
        //## List Pages builds
        //
        //    GET /repos/:owner/:repo/pages/builds
        //
        //== headers 200, :pagination => default_pagination_rels 
        //== json(:pages_build) { |h| [h] } 
    ),
    'listPagesBuildLatest' => array(
        //## List latest Pages build
        //
        //    GET /repos/:owner/:repo/pages/builds/latest
        //
        //== headers 200 
        //== json(:pages_build) 
    ),

);