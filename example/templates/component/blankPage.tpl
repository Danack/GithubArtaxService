{include file='component/pageStart'}


<div class="container">
  
<div class="row">
  <div class="col-md-12">
        
      <div class="navbar navbar-default">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#top-navigation">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">Tier Jig Skeleton</a>
        </div>
        <!-- <div class="collapse navbar-collapse" id="top-navigation">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="/gettingStarted">Getting started</a></li>
                <li>
                    <a class="github" href="https://github.com/Danack/Tier">
                        <i class="fa fa-github"></i>
                    </a>
                </li>
            </ul>
        </div> -->
        
    </div>
</div>

  </div>
</div>

<div class="row">
    <div class="col-md-2">
        {include file='component/sidebar'}
    </div>
    
    <div class="col-md-9">
    {block name='content'}
        This is the blank page - it should never be seen.
    {/block}
    </div>
</div>

{include file='component/pageEnd'}

 