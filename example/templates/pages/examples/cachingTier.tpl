
{extends file="component/blankPage"}

{block name='content'}
<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
        
<h2>
    Caching example
</h2>

<p>
 *Insert caching example here*
</p>

        
<pre>
    
    function imageController()
    {
        $tiers = [];
        $tiers[] = new Tier('cachedImageCallable', $injectionParams);
        $tiers[] = new Tier('createImageTask');
        $tiers[] = new Tier('directCustomImageCallable');

        return $tiers;
    }
</pre>


     </div>
   </div>
 </div>
{/block}