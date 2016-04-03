
{extends file="component/blankPage"}

{block name='content'}
<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
      <h2>
          List repo commits.
      </h2>
      <p>
        This is a really simple skeleton application to show how the Tier and Jig libraries can be used.
      </p>
      
      {inject name='commitList' type='GithubService\Model\CommitList'}

      {foreach $commitList->commitsChild as $commit}
          Sha: {$commit->sha}
          Message: {$commit->commitInfo->message} 
          <br/>
      {/foreach}
    </div>
  </div>
</div>
{/block}