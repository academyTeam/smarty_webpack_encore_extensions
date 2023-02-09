<?php

namespace AcademyTeam\SmartyWebpackEncore\Extension;

class EntrypointFinder
{
    public static function getEntrypoints()
    {
        //find entrypoints file and return conten
       $path = EntrypointFinder::getWebpackConfigPath();

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

}