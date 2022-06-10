<?php

ob_start();

function component($name, $props = [])
{
    global $ROOT_PATH;
    $file = $ROOT_PATH . './templates/'.$name.'.php';
    if (!file_exists($file)) {
        abort(500, "Invalid component: $name\n File not found");
    }

    //Start output buffer
    ob_start();

    //Pass variables
    foreach($props as $key => $value)
        $$key = $value;

    try {
        //Parse Components
        require $file;
    } catch (Error $e) {
        ob_end_clean();
        ob_end_clean();
        abort(500, "Error parsing component: $name\n".$e->getMessage());
    }

    //Get Contents
    $content = ob_get_contents();

    //End Outbuffering

    ob_end_clean();
    return "\n$content\n";
}