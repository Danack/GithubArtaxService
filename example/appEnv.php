<?php


// This is a place-holder file
function getAppEnv()
{
    static $env = [
        'jig_compilecheck' => 'COMPILE_CHECK_MTIME',
        'caching_setting' => 'caching.revalidate',
        'script_packing' => false,
    ];

    return $env;
}
