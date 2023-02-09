<?php

use AcademyTeam\SmartyWebpackEncore\Extension\EntrypointFinder;

function smarty_function_encore_entry_link_tags($params, Smarty_Internal_Template $template)
{
    $entrypointFinder = new EntrypointFinder();
    $entrypoints = $entrypointFinder->getEntrypoints();

    $return = "";
    $name = $params['name'];
    $files = $entrypoints[$name]['css'];

    foreach ($files as $value) {
        $return .= '<link rel="stylesheet" href=' . $value . '>' . PHP_EOL;

    }
    return $return;
}

