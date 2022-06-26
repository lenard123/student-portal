<?php

ob_start();

function getComponent($name)
{
    $name = ROOT_PATH . '/templates/'.$name;

    if (file_exists("{$name}.php")) 
        return "{$name}.php";

    if (is_dir($name) && file_exists($name.'/index.php')) {
        return $name .'/index.php';
    }

    return $name . '.php';
}

function component($name, $props = ['slot' => null])
{
    $file = getComponent($name);
    if (!file_exists($file)) {
        abort(500, "Invalid component: $name\n File not found");
    }

    //Start output buffer
    ob_start();

    //Pass variables
    if (is_array($props)) {
        foreach($props as $key => $value)
            $$key = $value;
    }

    try {
        //Parse Components
        require $file;
    } catch (Error $e) {
        ob_end_clean();
        ob_end_clean();
        abort("Error parsing component: $name\n".$e->getMessage());
    }

    //Get Contents
    $content = ob_get_contents();

    //End Outbuffering

    ob_end_clean();
    return "$content";
}


$component_stack = [];
function component_start($name, $props = [])
{
    global $component_stack;
    $props['slots'] = array();
    ob_start();
    array_push($component_stack, compact('name', 'props'));
}

function component_end()
{
    global $component_stack;
    $template = array_pop($component_stack);
    $template['props']['slot'] = ob_get_contents(); ob_end_clean();
    echo component(...$template);
}

$slot_stack = array();
$slots = array();

function slot($name)
{
    global $slot_stack;
    array_push($slot_stack, $name);
    ob_start();
}

function slot_end() {
    global $slot_stack, $slots;
    $slot_name = array_pop($slot_stack);
    $content = ob_get_contents(); ob_end_clean();
    $slots[$slot_name] = $content;
}

function getSlot($name)
{
    global $slots;
    return $slots[$name];
}