<?php

return array(

        //---
        //title: Watching | GitHub API
        //---
        //
        //# Watching
        //
        //* TOC
        //{:toc}
        //
        //Watching a Repository registers the user to receive notifications on new
        //discussions, as well as events in the user's activity feed.  See [Repository
        //Starring](/v3/activity/starring) for simple repository bookmarks.
        //
        //### Watching vs. Starring
        //
        //In August 2012, we [changed the way watching
        //works](https://github.com/blog/1204-notifications-stars) on GitHub.  At the time
        //of that change, many API clients were already using the existing "watcher"
        //endpoints to access starring data. To avoid breaking those applications, the
        //legacy "watcher" endpoints continue to provide starring data.
        //
        //To provide access to watching data, the v3 Watcher API uses the "subscription"
        //endpoints described below. Check out the [Watcher API Change
        //post](/changes/2012-9-5-watcher-api/) for more details.
        //
        //## List watchers
        //
        //    GET /repos/:owner/:repo/subscribers
        //
        //### Response
        //
        //== headers 200, :pagination => default_pagination_rels 
        //== json(:user) { |h| [h] } 
        //
        //## List repositories being watched
        //
        //List repositories being watched by a user.
        //
        //    GET /users/:username/subscriptions
        //
        //List repositories being watched by the authenticated user.
        //
        //    GET /user/subscriptions
        //
        //### Response
        //
        //== headers 200, :pagination => default_pagination_rels 
        //== json(:repo) { |h| [h] } 
        //
        //## Get a Repository Subscription
        //
        //    GET /repos/:owner/:repo/subscription
        //
        //### Response if you are subscribed to the repository
        //
        //== headers 200 
        //== json :repo_subscription 
        //
        //### Response if you are not subscribed to the repository
        //
        //== headers 404 
        //
        //## Set a Repository Subscription
        //
        //    PUT /repos/:owner/:repo/subscription
        //
        //### Parameters
        //
        //Name | Type | Description
        //-----|------|--------------
        //`subscribed`|`boolean`| Determines if notifications should be received from this repository.
        //`ignored`|`boolean`| Determines if all notifications should be blocked from this repository.
        //
        //{{#tip}}
        //
        //If you would like to watch a repository, set `subscribed` to `true`. If you would like to ignore notifications made within a repository, set `ignored` to `true`. If you would like to stop watching a repository, [delete the repository's subscription](#delete-a-repository-subscription) completely.
        //
        //{{/tip}}
        //
        //### Response
        //
        //== headers 200 
        //== json :repo_subscription 
        //
        //## Delete a Repository Subscription
        //
        //{{#tip}}
        //
        //This endpoint should only be used to stop watching a repository. To control whether or not you wish to receive notifications from a repository, [set the repository's subscription manually](#set-a-repository-subscription).
        //
        //{{/tip}}
        //
        //    DELETE /repos/:owner/:repo/subscription
        //
        //### Response
        //
        //== headers 204 
        //
        //## Check if you are watching a repository (LEGACY)
        //
        //Requires for the user to be authenticated.
        //
        //    GET /user/subscriptions/:owner/:repo
        //
        //### Response if this repository is watched by you
        //
        //== headers 204 
        //
        //### Response if this repository is not watched by you
        //
        //== headers 404 
        //
        //## Watch a repository (LEGACY)
        //
        //Requires the user to be authenticated.
        //
        //    PUT /user/subscriptions/:owner/:repo
        //
        //== fetch_content(:put_content_length) 
        //
        //### Response
        //
        //== headers 204 
        //
        //## Stop watching a repository (LEGACY)
        //
        //Requires for the user to be authenticated.
        //
        //    DELETE /user/subscriptions/:owner/:repo
        //
        //### Response
        //
        //== headers 204 

);