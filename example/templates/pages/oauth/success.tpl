
{extends file="component/blankPage"}

{block name='content'}
<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
        
      <h2>
          Oauth success
      </h2>
      {inject name='context' type='GithubExample\Context\OauthSuccessContext'}
      {if $context->accessResponse->scopes}
        You are now authed for the following scopes:<br/>
        {foreach $context->accessResponse->scopes as $scope}
            {$scope}"<br/>";
        {/foreach}
      {/if}
    </div>
  </div>
</div>
{/block}