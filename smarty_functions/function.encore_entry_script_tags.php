<?php

function smarty_function_encore_entry_script_tags($params, Smarty_Internal_Template $template)
{
    $json = file_get_contents(__DIR__ . '/../../../../../public/build/entrypoints.json');
    $array = json_decode($json, true);

    $return = "";
    $name = $params['name'];
    $files = $array['entrypoints'][$name]['js'];

    foreach ($files as $value) {
        $return .= '<script src="' . $value . '" defer></script>' . PHP_EOL;

    }

    return $return;
}