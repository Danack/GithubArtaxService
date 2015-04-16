<?php


return array(

    'listCollaborators' => array(
//        ## List collaborators {#list}
//        GET /repos/:owner/:repo/collaborators
//        
//        When authenticating as an organization owner of an organization-owned
//        repository, all organization owners are included in the list of collaborators.
//        Otherwise, only users with access to the repository are returned in the
//        collaborators list.
//        
//        ### Response
//        
//        == headers 200, :pagination => default_pagination_rels 
    ),


    'isUserCollaborator' => array(
    //    ## Check if a user is a collaborator {#get}
    //    GET /repos/:owner/:repo/collaborators/:username
    //
    //### Response if user is a collaborator
    //
    //== headers 204 
    //
    //### Response if user is not a collaborator
    //
    //== headers 404 
    
    ),

    'addUserAsCollaborator' => array (
    //## Add user as a collaborator {#add-collaborator}
    //
    //    PUT /repos/:owner/:repo/collaborators/:username
    //
    //== fetch_content(:put_content_length) 
    //
    //### Response
    //
    //== headers 204
    ),

    'removeUserAsCollaborator' => array(
    ## Remove user as a collaborator {#remove-collaborator}
//    
//        DELETE /repos/:owner/:repo/collaborators/:username
//    
//    ### Response
//    
//    == headers 204 
    ),
);