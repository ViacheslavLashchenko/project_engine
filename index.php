<?php

    if(!isset($_SESSION)) 
    { 
        session_start();  
    }
    require_once('./config.php');
    require_once(MOD_DIR . DS . 'tpl.php');
    require_once(MOD_DIR . DS . 'event.php');
    require_once(MOD_DIR . DS . 'mysql.php');
    $sql = new Sql($myhost, $myuser, $mypass, $mydbname);
    // $result = Sql::sqlQuery("SELECT * FROM `users`", __FILE__,__LINE__);
    // while ($row = $result->fetch_assoc()) {
    //     print_r($row);
    // }
    // exit;
    $event = new Event;

    if(is_file(PAGE_DIR . DS . Event::$currentPage . '.php')  && is_file(TPL_DIR . DS . Event::$currentEvent . '.php')) {
        require_once (PAGE_DIR . DS . Event::$currentPage . '.php');
    } else{
        header('Location: http://localhost/project_engine/404.php');
    }
    $pageClass = ucfirst(Event::$currentPage);
    $pageObj = new $pageClass;

    $pageObj->{Event::$currentEvent}();
    require_once(PAGE_DIR . DS . 'header.php');
    Tpl::parsePage();
    require_once(PAGE_DIR . DS . 'footer.php');


    





    ?>