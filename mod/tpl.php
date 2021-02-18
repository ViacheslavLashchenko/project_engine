<?php

class Tpl {
    
    static public $vars;
    
    public static function parsePage($module = '')
    {
        require_once TPL_DIR . DS . $module . Event::$currentEvent . '.php';
    }
}


?>