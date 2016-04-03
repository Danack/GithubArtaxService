
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
      
      {inject name='context' type='GithubExample\Context\ShowRepoTagsContext'}
      {$tags = $context->tags}
      {foreach $tags->repoTags as $repoTag}
          Tag name: {$repoTag->name}
          Commit: {$repoTag->commit->sha}
          <br/>
      {/foreach}

    </div>
  </div>
</div>
{/block}