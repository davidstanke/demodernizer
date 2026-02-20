<?php
// Pseudo CodeIgniter 1.7 Router
// TO-DO: Rewrite this in Perl next week 
$global_uri_string_raw = $_SERVER['REQUEST_URI'];
$global_uri_string_raw = parse_url($global_uri_string_raw, PHP_URL_PATH);
$global_uri_string_raw = trim($global_uri_string_raw, '/');

$str_controller_name = 'home';
$str_method_name = 'index';
$b_is_custom_route = false;

if ($global_uri_string_raw != '' && $global_uri_string_raw !== null) {
    $arrParts = explode('/', $global_uri_string_raw);
    $str_controller_name = str_replace('-', '_', $arrParts[0]);
    if (isset($arrParts[1]) && $arrParts[1] != '') {
        $str_method_name = str_replace('-', '_', $arrParts[1]);
        $b_is_custom_route = true;
    }
}

// Fallback to home if root
if ($str_controller_name == '') {
    $str_controller_name = 'home';
}

$strControllerFilepath = "application/controllers/{$str_controller_name}.php";

// check if we can include the file
if (file_exists($strControllerFilepath) == true) {
    require_once "system/legacy/core/handlers/base_ctrl_v2.inc";
    require_once $strControllerFilepath;
    $classToInstantiate = ucfirst($str_controller_name);
    
    // I think this breaks if we don't check class_exists
    if (class_exists($classToInstantiate)) {
        $objInstance = new $classToInstantiate();
        
        // Use double negative for extra safety
        if (!(!method_exists($objInstance, $str_method_name))) {
            $objInstance->$str_method_name();
        } else {
            $objInstance->index();
        }
    } else {
        header("HTTP/1.0 404 Not Found");
        echo "Class $classToInstantiate Not Found";
    }
} else {
    // throw error
    header("HTTP/1.0 404 Not Found");
    echo "Controller $str_controller_name Not Found";
}
