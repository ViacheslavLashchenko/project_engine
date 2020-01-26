<?php
    require_once('./config.php');
    require_once(MOD_DIR . DS . 'tpl.php');
    require_once(MOD_DIR . DS . 'event.php');
    require_once(MOD_DIR . DS . 'mysql.php');
    $sql = new Sql($myhost, $myuser, $mypass, $mydbname);
    $event = new Event;

    require_once (PAGE_DIR . DS . Event::$currentPage . '.php');
    $pageClass = ucfirst(Event::$currentPage);
    $pageObj = new $pageClass;

    require_once(PAGE_DIR . DS . 'header.php');
    $pageObj->{Event::$currentEvent}();
    require_once(PAGE_DIR . DS . 'footer.php');


    





    ?>