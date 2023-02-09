<?php

use AcademyTeam\SmartyWebpackEncore\Extension\EntrypointFinder;

function smarty_function_encore_entry_script_tags($params, Smarty_Internal_Template $template)
{
    $entrypoints = EntrypointFinder::getEntrypoints();

    $return = "";
    $name = $params['name'];
    $files = $entrypoints['entrypoints'][$name]['js'];

    foreach ($files as $value) {
        $return .= '<script src="' . $value . '" defer></script>' . PHP_EOL;

    }

    return $return;
}