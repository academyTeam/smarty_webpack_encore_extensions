<?php

namespace AcademyTeam\SmartyWebpackEncore\Extension;

class EntrypointFinder
{
    public function getEntrypoints()
    {
        //find entrypoints file and return content

        $entrypointsPath = $this->getEntrypointsPath();
        if (!file_exists($entrypointsPath)) {
            throw new \Exception('entrypoints.json could not be found. Try running Webpack.');
        }

       $content = file_get_contents($entrypointsPath);
       $array = json_decode($content, true);

       return $array['entrypoints'];
    }

    public function getEntrypointsPath()
    {
        $path = $this->getWebpackConfigPath();

        $config = file_get_contents($path);

        $tmp = explode('.setOutputPath(', $config);
        $between = explode(')', $tmp[1]);

        return dirname($path) . DIRECTORY_SEPARATOR . trim($between[0], '"\'/ ') . DIRECTORY_SEPARATOR . 'entrypoints.json';
    }

    public function getWebpackConfigPath() {
        $path = __DIR__;

        while ($path !== dirname(DIRECTORY_SEPARATOR)) {
            $path = dirname($path);

            if (file_exists($path . DIRECTORY_SEPARATOR . "webpack.config.js")) {
                return $path . DIRECTORY_SEPARATOR . "webpack.config.js";
            }
        }

        throw new \Exception('Webpack config file not found.');
    }

}