
{extends file="component/blankPage"}

{block name='content'}
<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
        
      <h2>
          Something went wrong with oauth
      </h2>
        
      {inject name='context' type='GithubExample\Context\OauthErrorContext'}
        
       <p>
           Error is: 
           {$context->errorMessage}
       </p>
    
    </div>
  </div>
</div>
{/block}