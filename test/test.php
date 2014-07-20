<?php



//
//$result = apc_add("SomeKey", "SomeValue");
//var_dump($result);
//

//print_r();

$result = @apc_cache_info();

if ($result === false) {

}
