
{extends file="component/blankPage"}

{block name='content'}
<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">

      {inject name='context' type='GithubExample\Context\StartOauthRequest'}

      <h2>
          Github Artax Service Test
      </h2>
      
      <p>
        Requesting scopes: {$context->scopesString}
      </p>

      <p>
        Please click <a href='{$context->authURL | nofilter}'>here to auth</a> with github. <br/>
           (In a real application, this redirect should happen automatically.)
      </p>
    </div>
  </div>
</div>
{/block}