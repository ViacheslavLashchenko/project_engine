<?php

class Tpl {
    
    static public $vars;
    
    public static function parsePage($tplName = '')
    {
        require_once TPL_DIR . DS . (empty($tplName) ? Event::$currentEvent : $tplName) . '.php';
    }
}


?>