<?php
spl_autoload_register('autoLoadClasses');

function autoLoadClasses($classname)
{
    $path = '../classes/';
    $extension = '.class.php';
    $filename = $path . $classname . $extension;

    if (!file_exists($filename)) {
        return false;
    }

    include_once $filename;
}