<?php

    if(!isset($_SESSION)) {session_start();}

    require_once('config.php');
    require_once(MOD_DIR . DS . 'tpl.php');
    require_once(MOD_DIR . DS . 'event.php');
    require_once(MOD_DIR . DS . 'mysql.php');
    require_once(MOD_DIR . DS . 'security.php');
    $sql = new Sql($myhost, $myuser, $mypass, $mydbname);
   
    $event = new Event;


    if (is_file(PAGE_DIR . DS . Event::$currentPage . '.php') && (is_file(TPL_DIR . DS . Event::$currentEvent . '.php') || is_file(TPL_DIR . DS . 'admin/' . Event::$currentEvent . '.php')))
    {
        require_once(PAGE_DIR . DS . Event::$currentPage . '.php');
    } else
    {
        header("Location:" . ROOT_URL . "404.php");
    }
    $pageClass = ucfirst(Event::$currentPage);
    $pageObj = new $pageClass;

    $pageObj->{Event::$currentEvent}();

    if (Event::$currentPage == ADMIN_PAGE) {
        require_once('admin.php');
    } else {
        require_once('guest.php');
    }
    

?>