<?php
    function autocarga($classname){
        //$class_rev = str_replace('Controller','',$classname);
        require_once 'controllers/'.$classname.'.php';
    }
    spl_autoload_register('autocarga');
?>