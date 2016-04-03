<?php


namespace GithubService;

use Amp\Artax\Request;

class CurlDebug
{
    private function __construct()
    {

    }
    
    public static function fromRequest(Request $request)
    {
        $commandLines = [];
        $commandLines[] = "curl -i";
        
        $commandLines[] = "-X ".$request->getMethod()."";
        
        //curl -i -H "Accept: application/json" -H "Content-Type: application/json" http://hostname/resource
        $headers = $request->getAllHeaders();
        foreach ($headers as $name => $values) {
            foreach ($values as $value) {
                $commandLines[] = sprintf(
                    '-H "%s: %s"',
                    $name, $value
                );
            }
        }

        $body = $request->getBody();

        if ($body !== null) {
            $commandLines[] = '-d "'.addslashes($body).'"';
        }

        $commandLines[] = $request->getUri();
        
        return implode(" \\\n", $commandLines);
    }
}
