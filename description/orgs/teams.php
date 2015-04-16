<?php

return array(

        //---
        //title: Organization Teams | GitHub API
        //---
        //
        //# Teams
        //
        //* TOC
        //{:toc}
        //
        //All actions against teams require at a minimum an authenticated user who
        //is a member of the Owners team in the `:org` being managed. Additionally,
        //OAuth users require the "read:org" [scope](/v3/oauth/#scopes).
        //
        //## List teams
        //
        //    GET /orgs/:org/teams
        //
        //### Response
        //
        //== headers 200, :pagination => default_pagination_rels 
        //== json(:team) { |h| [h] } 
        //
        //## Get team
        //
        //    GET /teams/:id
        //
        //### Response
        //
        //== headers 200 
        //== json(:full_team) 
        //
        //## Create team
        //
        //In order to create a team, the authenticated user must be an owner of
        //`:org`.
        //
        //    POST /orgs/:org/teams
        //
        //### Parameters
        //
        //Name | Type | Description
        //-----|------|--------------
        //`name`|`string` | **Required**. The name of the team.
        //`description`|`string` | The description of the team.
        //`repo_names`|`array` of `strings` | The repositories to add the team to.
        //`permission`|`string` | The permission to grant the team. Can be one of:<br/> * `pull` - team members can pull, but not push to or administer these repositories.<br/> * `push` - team members can pull and push, but not administer these repositories.<br/> * `admin` - team members can pull, push and administer these repositories.<br/>Default: `pull`
        //
        //#### Example
        //
        //== json \
        //  :name => 'new team',
        //  :description => 'team description',
        //  :permission => 'push',
        //  :repo_names => ['github/dotfiles'] 
        //
        //### Response
        //
        //== headers 201 
        //== json(:full_team) 
        //
        //## Edit team
        //
        //In order to edit a team, the authenticated user must be an owner of
        //the org that the team is associated with.
        //
        //    PATCH /teams/:id
        //
        //### Parameters
        //
        //Name | Type | Description
        //-----|------|--------------
        //`name`|`string` | **Required**. The name of the team.
        //`description`|`string` | The description of the team.
        //`permission`|`string` | The permission to grant the team. Can be one of:<br/> * `pull` - team members can pull, but not push to or administer these repositories.<br/> * `push` - team members can pull and push, but not administer these repositories.<br/> * `admin` - team members can pull, push and administer these repositories. Default: `pull`
        //
        //#### Example
        //
        //== json \
        //  :name => 'new team name',
        //  :name => 'new team description',
        //  :permission => 'push' 
        //
        //### Response
        //
        //== headers 200 
        //== json(:full_team) 
        //
        //## Delete team
        //
        //In order to delete a team, the authenticated user must be an owner of
        //the org that the team is associated with.
        //
        //    DELETE /teams/:id
        //
        //### Response
        //
        //== headers 204 
        //
        //## List team members
        //
        //In order to list members in a team, the authenticated user must be a
        //member of the team.
        //
        //    GET /teams/:id/members
        //
        //### Response
        //
        //== headers 200, :pagination => default_pagination_rels 
        //== json(:user) { |h| [h] } 
        //
        //## Get team member
        //
        //### Deprecation notice
        //
        //<div class="alert">
        //  <p>
        //    The "Get team member" API (described below) is
        //    <a href="/v3/versions/#v3-deprecations">deprecated</a> and is scheduled for
        //    removal in the next major version of the API.
        //
        //    We recommend using the
        //    <a href="/v3/orgs/teams/#get-team-membership">Get team membership API</a>
        //    instead. It allows you to get both active and pending memberships.
        //  </p>
        //</div>
        //
        //In order to get if a user is a member of a team, the authenticated user
        //must be a member of the team.
        //
        //    GET /teams/:id/members/:username
        //
        //### Response if user is a member
        //
        //== headers 204 
        //
        //### Response if user is not a member
        //
        //== headers 404 
        //
        //## Add team member
        //
        //### Deprecation notice
        //
        //<div class="alert">
        //  <p>
        //    The "Add team member" API (described below) is
        //    <a href="/v3/versions/#v3-deprecations">deprecated</a> and is scheduled for
        //    removal in the next major version of the API.
        //
        //    We recommend using the
        //    <a href="/v3/orgs/teams/#add-team-membership">Add team membership API</a>
        //    instead. It allows you to invite new organization members to your teams.
        //  </p>
        //</div>
        //
        //In order to add a user to a team, the authenticated user must have
        //'admin' permissions to the team or be an owner of the organization that the team
        //is associated with, and the user being added must already be a member of at
        //least one other team on the same organization.
        //
        //    PUT /teams/:id/members/:username
        //
        //== fetch_content(:put_content_length) 
        //
        //### Response
        //
        //== headers 204 
        //
        //If you attempt to add an organization to a team, you will get this:
        //
        //== headers 422 
        //==
        //  json :message => "Cannot add an organization as a member.",
        //    :errors => [{
        //      :code     => "org",
        //      :field    => :user,
        //      :resource => :TeamMember
        //    }]
        //
        //
        //If you attempt to add a user to a team and that user is not a member of at least
        //one other team on the same organization, you will get this:
        //
        //== headers 422 
        //==
        //  json :message => "User isn't a member of this organization. Please invite them first.",
        //    :errors => [{
        //      :code     => "unaffiliated",
        //      :field    => :user,
        //      :resource => :TeamMember
        //    }]
        //
        //
        //## Remove team member
        //
        //### Deprecation notice
        //
        //<div class="alert">
        //  <p>
        //    The "Remove team member" API (described below) is
        //    <a href="/v3/versions/#v3-deprecations">deprecated</a> and is scheduled for
        //    removal in the next major version of the API.
        //
        //    We recommend using the
        //    <a href="/v3/orgs/teams/#remove-team-membership">Remove team membership API</a>
        //    instead. It allows you to remove both active and pending memberships.
        //  </p>
        //</div>
        //
        //In order to remove a user from a team, the authenticated user must have
        //'admin' permissions to the team or be an owner of the org that the team
        //is associated with.
        //NOTE: This does not delete the user, it just removes them from the team.
        //
        //    DELETE /teams/:id/members/:username
        //
        //### Response
        //
        //== headers 204 
        //
        //## Get team membership
        //
        //In order to get a user's membership with a team, the authenticated user must be
        //a member of the team or an owner of the team's organization.
        //
        //    GET /teams/:id/memberships/:username
        //
        //### Response if user has an active membership with team
        //
        //== headers 200 
        //== json(:active_team_membership) 
        //
        //### Response if user has a pending membership with team
        //
        //== headers 200 
        //== json(:pending_team_membership) 
        //
        //### Response if user has no membership with team
        //
        //== headers 404 
        //
        //## Add team membership
        //
        //In order to add a membership between a user and a team, the authenticated user
        //must have 'admin' permissions to the team or be an owner of the organization
        //that the team is associated with.
        //
        //If the user is already a part of the team's organization (meaning they're on at
        //least one other team in the organization), this endpoint will add the user to
        //the team.
        //
        //If the user is completely unaffiliated with the team's organization (meaning
        //they're on none of the organization's teams), this endpoint will send an
        //invitation to the user via email. This newly-created membership will be in the
        //"pending" state until the user accepts the invitation, at which point the
        //membership will transition to the "active" state and the user will be added as a
        //member of the team.
        //
        //    PUT /teams/:id/memberships/:username
        //
        //### Response if user's membership with team is now active
        //
        //== headers 200 
        //== json(:active_team_membership) 
        //
        //### Response if user's membership with team is now pending
        //
        //== headers 200 
        //== json(:pending_team_membership) 
        //
        //If you attempt to add an organization to a team, you will get this:
        //
        //== headers 422 
        //==
        //  json :message => "Cannot add an organization as a member.",
        //    :errors => [{
        //      :code     => "org",
        //      :field    => :user,
        //      :resource => :TeamMember
        //    }]
        //
        //
        //## Remove team membership
        //
        //In order to remove a membership between a user and a team, the authenticated
        //user must have 'admin' permissions to the team or be an owner of the
        //organization that the team is associated with.
        //NOTE: This does not delete the user, it just removes their membership from the
        //team.
        //
        //    DELETE /teams/:id/memberships/:username
        //
        //### Response
        //
        //== headers 204 
        //
        //## List team repos
        //
        //    GET /teams/:id/repos
        //
        //### Response
        //
        //== headers 200, :pagination => default_pagination_rels 
        //== json(:repo) { |h| [h] } 
        //
        //## Check if a team manages a repository {#get-team-repo}
        //
        //    GET /teams/:id/repos/:owner/:repo
        //
        //### Response if repository is managed by this team
        //
        //== headers 204 
        //
        //### Response if repository is not managed by this team
        //
        //== headers 404 
        //
        //## Add team repository {#add-team-repo}
        //
        //In order to add a repository to a team, the authenticated user must be an
        //owner of the org that the team is associated with.  Also, the repository must
        //be owned by the organization, or a direct fork of a repository owned by the
        //organization.
        //
        //    PUT /teams/:id/repos/:org/:repo
        //
        //== fetch_content(:put_content_length) 
        //
        //### Response
        //
        //== headers 204 
        //
        //If you attempt to add a repository to a team that is not owned by the
        //organization, you get:
        //
        //== headers 422 
        //==
        //  json :message => "Validation Failed",
        //    :errors => [{
        //      :code     => "not_owned",
        //      :field    => :repository,
        //      :resource => :TeamMember}]
        //
        //
        //## Remove team repository {#remove-team-repo}
        //
        //In order to remove a repository from a team, the authenticated user must be an
        //owner of the org that the team is associated with. Also, since the Owners team
        //always has access to all repositories in the organization, repositories cannot
        //be removed from the Owners team.
        //NOTE: This does not delete the repository, it just removes it from the team.
        //
        //    DELETE /teams/:id/repos/:owner/:repo
        //
        //### Response
        //
        //== headers 204 
        //
        //## List user teams
        //
        //List all of the teams across all of the organizations to which the
        //authenticated user belongs. This method requires `user` or `repo`
        //[scope][] when authenticating via [OAuth][].
        //
        //    GET /user/teams
        //
        //### Response
        //
        //== headers 200, :pagination => default_pagination_rels 
        //== json(:full_team) { |h| [h] } 
        //
        //[OAuth]: /v3/oauth/
        //[scope]: /v3/oauth/#scopes
);