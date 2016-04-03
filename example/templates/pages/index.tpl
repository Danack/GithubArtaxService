
{extends file="component/blankPage"}

{block name='content'}
<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
        
      <h2>
          Tier + Jig skeleton app
      </h2>

      {inject name='oauthContext' type='GithubExample\Context\OauthContext'}

      <p>
      {if $oauthContext->isAuthenticated}
          You are authenticated. All of the examples will be available to you. 
      {else}
          You are NOT authenticated. Some of the examples will be unavailable to you.
      {/if}
      </p>
    </div>
  </div>
</div>
{/block}