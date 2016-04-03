
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
        {inject name='context' type='GithubExample\Context\ShowUserEmailsContext'}
        {renderUserEmails($context->userEmails)}
        </p>

    </div>
  </div>
</div>
{/block}