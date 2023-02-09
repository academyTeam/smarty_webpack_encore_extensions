<?php

use AcademyTeam\SmartyWebpackEncore\Extension\EntrypointFinder;

function smarty_function_encore_entry_link_tags($params, Smarty_Internal_Template $template)
{
    $entrypoints = EntrypointFinder::getEntrypoints();

    $return = "";
    $name = $params['name'];
    $files = $entrypoints['entrypoints'][$name]['css'];

    foreach ($files as $value) {
        $return .= '<link rel="stylesheet" href=' . $value . '>' . PHP_EOL;

    }
    return $return;
}

