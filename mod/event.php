<?php

class Event {
    
    static public $currentPage;
    static public $currentEvent;

    public function __construct()
    {
        $atmp = explode('/', $_SERVER['REQUEST_URI']);
        self::$currentPage = (isset($atmp[2]) && !empty($atmp[2])) ? $atmp[2] : ROOT_PAGE;
        self::$currentEvent = (isset($atmp[3]) && !empty($atmp[3])) ? $atmp[3] : ROOT_EVENT;

        $_GET = [];
        $count = count($atmp); 
        for ($i=3; $i<$count; $i+=2) {
            if (isset($atmp[$i+1])) {
              $_GET[$atmp[$i]] = $atmp[$i+1];
            }
        }
    }
}


?>