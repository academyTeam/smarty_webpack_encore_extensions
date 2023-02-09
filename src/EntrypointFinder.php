<?php

namespace AcademyTeam\SmartyWebpackEncore\Extension;

class EntrypointFinder
{
    public static function getEntrypoints()
    {
        //find entrypoints file and return conten
       $path = EntrypointFinder::getWebpackConfigPath();
        $config = file_get_contents($path);

        $tmp = explode('.setOutputPath(', $config);
        $between = explode(')', $tmp[1]);

        echo dirname($path) . DIRECTORY_SEPARATOR . trim($between[0], '"\' ');
    }

    private static function getWebpackConfigPath() {
        $path = dirname(__DIR__);

        do {
            $path = dirname($path);

            if (file_exists($path.DIRECTORY_SEPARATOR."webpack.config.js")) {
                return $path . DIRECTORY_SEPARATOR . "webpack.config.js";
            }

        } while ($path !== dirname(DIRECTORY_SEPARATOR));

        throw new \Exception('file not found');
    }
    
    private static function get(){
        
    }
    

}