<?php

namespace AcademyTeam\SmartyWebpackEncore\Extension;

class EntrypointFinder
{
    public static function getEntrypoints(): array
    {
        //find entrypoints file and return contents


        $json = file_get_contents(__DIR__ . '/../../../../../public/build/entrypoints.json');
        $array = json_decode($json, true);
        __FILE__

        return $array;
    }

}