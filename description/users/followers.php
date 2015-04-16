<?php

return array(

    'listFollowersOfUser' => array(
        //## List followers of a user
        //
        //List a user's followers:
        //
        //    GET /users/:username/followers
        //
        //List the authenticated user's followers:
        //
        //    GET /user/followers
        //
        //### Response
        //
        //== headers 200, :pagination => default_pagination_rels 
        //== json(:user) { |h| [h] } 
    ),

    'listUserFollowing' => array(
        //## List users followed by another user
        //
        //List who a user is following:
        //
        //    GET /users/:username/following
        //
        //List who the authenticated user is following:
        //
        //    GET /user/following
        //
        //### Response
        //
        //== headers 200, :pagination => default_pagination_rels 
        //== json(:user) { |h| [h] } 
    ),
    'checkSelfFollowingUser' => array(
        //## Check if you are following a user
        //
        //    GET /user/following/:username
        //
        //### Response if you are following this user
        //
        //== headers 204 
        //
        //### Response if you are not following this user
        //
        //== headers 404 
    ),

    'checkUserFollowingUser' => array(
        //## Check if one user follows another
        //
        //    GET /users/:username/following/:target_user
        //
        //### Response if user follows target user
        //
        //== headers 204 
        //
        //### Response if user does not follow target user
        //
        //== headers 404 
    ),

    'followUser' => array(
        //## Follow a user
        //
        //    PUT /user/following/:username
        //
        //== fetch_content(:put_content_length) 
        //
        //Following a user requires the user to be logged in and authenticated with basic
        //auth or OAuth with the `user:follow` scope.
        //
        //### Response
        //
        //== headers 204
    ), 
    
    'unfollowUser' => array(
        //## Unfollow a user
        //
        //    DELETE /user/following/:username
        //
        //Unfollowing a user requires the user to be logged in and authenticated with basic
        //auth or OAuth with the `user:follow` scope.
        //
        //### Response
        //
        //== headers 204 
    ),
);