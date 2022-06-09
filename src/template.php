<?php

function component($name, $props = [])
{
    $file = ROOT_PATH . './templates/'.$name.'.php';
    if (!file_exists($file)) {
        abort(500, "Invalid component: $name\n File not found");
    }

    //Start output buffer
    ob_start();

    //Pass variables
    foreach($props as $key => $value)
        $$key = $value;

    //Parse Components
    include $file;

    //Get Contents
    $content = ob_get_contents();

    //End Outbuffering

    ob_end_clean();
    return "\n$content\n";
}