<?php
    require_once(PAGE_DIR . DS . 'header.php');
    require_once(TPL_DIR . DS . 'admin/adminSidebar.php');
    Tpl::parsePage('admin/');
    require_once(PAGE_DIR . DS . 'footer.php');
?>