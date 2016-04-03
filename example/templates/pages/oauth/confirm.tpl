
{extends file="component/blankPage"}

{block name='content'}
<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
        
      <h2>
          Github Artax Service Test
      </h2>
      
      <p>
        You are not authorised yet. Please complete the form to generate an oauth token. 
      </p>
      
      {showScopesForm()}
    </div>
  </div>
</div>
{/block}