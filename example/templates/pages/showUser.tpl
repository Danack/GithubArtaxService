
{extends file="component/blankPage"}

{block name='content'}
<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
        
      <h2>
          Tier + Jig skeleton app
      </h2>
      
      <p>
        User info:
      </p>
        
        <p>
        {inject name='showUserContext' type='GithubExample\Context\ShowUserContext'}
        {renderUserInfo($showUserContext->user)}
        </p>

    </div>
  </div>
</div>
{/block}