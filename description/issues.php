<?php

return array(


       //Issues use [these custom media types](#custom-media-types). You can
       //read more about the use of media types in the API [here](/v3/media/).

    'listIssues' => array(

        //## List issues
        //
        //== fetch_content(:prs_as_issues) 
        //
        //List all issues across all the authenticated user's visible repositories
        //including owned repositories, member repositories, and organization
        //repositories:
        //
        //    GET /issues
        //
        //List all issues across owned and member repositories for the authenticated user:
        //
        //    GET /user/issues
        //
        //List all issues for a given organization for the authenticated user:
        //
        //    GET /orgs/:org/issues
        //
        //### Parameters
        //
        //Name | Type | Description
        //-----|------|--------------
        //`filter`|`string`| Indicates which sorts of issues to return. Can be one of:<br/>* `assigned`: Issues assigned to you<br/>* `created`: Issues created by you<br/>* `mentioned`: Issues mentioning you<br/>* `subscribed`: Issues you're subscribed to updates for<br/>* `all`: All issues the authenticated user can see, regardless of participation or creation<br/> Default: `assigned`
        //`state`|`string`| Indicates the state of the issues to return. Can be either `open`, `closed`, or `all`. Default: `open`
        //`labels`|`string`| A list of comma separated label names.  Example: `bug,ui,@high`
        //`sort`|`string`|  What to sort results by. Can be either `created`, `updated`, `comments`. Default: `created`
        //`direction`|`string`| The direction of the sort. Can be either `asc` or `desc`. Default: `desc`
        //`since`|`string` | Only issues updated at or after this time are returned. This is a timestamp in ISO 8601 format: `YYYY-MM-DDTHH:MM:SSZ`.
        //
        //### Response
        //
        //== headers 200, :pagination => default_pagination_rels 
        //== json(:issue) { |h| [h] } 
    ),
    'listRepoIssues' => array(
        //## List issues for a repository
        //
        //== fetch_content(:prs_as_issues) 
        //
        //    GET /repos/:owner/:repo/issues
        //
        //### Parameters
        //
        //Name | Type | Description
        //-----|------|--------------
        //`milestone`|`integer` or `string`| If an `integer` is passed, it should refer to a milestone number. If the string `*` is passed, issues with any milestone are accepted. If the string `none` is passed, issues without milestones are returned.
        //`state`|`string`| Indicates the state of the issues to return. Can be either `open`, `closed`, or `all`. Default: `open`
        //`assignee`|`string`| Can be the name of a user. Pass in `none` for issues with no assigned user, and `*` for issues assigned to any user.
        //`creator`|`string`| The user that created the issue.
        //`mentioned`|`string`| A user that's mentioned in the issue.
        //`labels`|`string`| A list of comma separated label names.  Example: `bug,ui,@high`
        //`sort`|`string`|  What to sort results by. Can be either `created`, `updated`, `comments`. Default: `created`
        //`direction`|`string`| The direction of the sort. Can be either `asc` or `desc`. Default: `desc`
        //`since`|`string` |Only issues updated at or after this time are returned. This is a timestamp in ISO 8601 format: `YYYY-MM-DDTHH:MM:SSZ`.
        //
        //### Response
        //
        //== headers 200, :pagination => default_pagination_rels 
        //== json(:issue) { |h| [h] } 
    ),

    'getIssue' => array(
        //## Get a single issue
        //
        //== fetch_content(:prs_as_issues) 
        //
        //    GET /repos/:owner/:repo/issues/:number
        //
        //### Response
        //
        //== headers 200 
        //== json :full_issue 
    ),
    'createIssue' => array(
        //## Create an issue
        //
        //Any user with pull access to a repository can create an issue.
        //
        //    POST /repos/:owner/:repo/issues
        //
        //### Parameters
        //
        //Name | Type | Description
        //-----|------|--------------
        //`title`|`string` | **Required**. The title of the issue.
        //`body`|`string` | The contents of the issue.
        //`assignee`|`string` | Login for the user that this issue should be assigned to. _NOTE: Only users with push access can set the assignee for new issues. The assignee is silently dropped otherwise._
        //`milestone`|`number` | Milestone to associate this issue with. _NOTE: Only users with push access can set the milestone for new issues. The milestone is silently dropped otherwise._
        //`labels`|`array` of `strings` | Labels to associate with this issue. _NOTE: Only users with push access can set labels for new issues. Labels are silently dropped otherwise._
        //
        //#### Example
        //
        //== json \
        //  :title     => "Found a bug",
        //  :body      => "I'm having a problem with this.",
        //  :assignee  => "octocat",
        //  :milestone => 1,
        //  :labels    => %w(Label1 Label2)
        //
        //
        //### Response
        //
        //== headers 201, :Location => get_resource(:full_issue)['url'] 
        //== json :full_issue 
    ),
    'updateIssue' => array(
        //## Edit an issue
        //
        //Issue owners and users with push access can edit an issue.
        //
        //    PATCH /repos/:owner/:repo/issues/:number
        //
        //### Parameters
        //
        //Name | Type | Description
        //-----|------|--------------
        //`title`|`string` | The title of the issue.
        //`body`|`string` | The contents of the issue.
        //`assignee`|`string` | Login for the user that this issue should be assigned to.
        //`state`|`string` | State of the issue. Either `open` or `closed`.
        //`milestone`|`number` | Milestone to associate this issue with. _NOTE: Only users with push access can set the milestone for issues. The milestone is silently dropped otherwise._
        //`labels`|`array` of `strings` | Labels to associate with this issue. Pass one or more Labels to _replace_ the set of Labels on this Issue. Send an empty array (`[]`) to clear all Labels from the Issue. _NOTE: Only users with push access can set labels for issues. Labels are silently dropped otherwise._
        //
        //
        //#### Example
        //
        //== json \
        //  :title     => "Found a bug",
        //  :body      => "I'm having a problem with this.",
        //  :assignee  => "octocat",
        //  :milestone => 1,
        //  :state     => "open",
        //  :labels    => %w(Label1 Label2)
        //
        //
        //### Response
        //
        //== headers 200 
        //== json :full_issue 
    ),

    //## Custom media types
    //
    //These are the supported media types for issues. You can read more about the
    //use of media types in the API [here](/v3/media/).
    //
    //    application/vnd.github.VERSION.raw+json
    //    application/vnd.github.VERSION.text+json
    //    application/vnd.github.VERSION.html+json
    //    application/vnd.github.VERSION.full+json
);
