<?php

class Admin {


    public function info()
    {
        Secur::checkAdminAccess();
    //  // Скрипт проверки

    // if (isset($_SESSION['login'])) {
    //     print "Привет, ".$_SESSION['login'].". Всё работает! Ты зашел на сайт в ".$_SESSION['time'];
    }

    public function adminSidebar()
    {
    
    }


    public function gallery()
    {
    
    }

    public function logout()
    {
    
    }


    public function changeAccountInfo()
    {
        Secur::checkAdminAccess();

        if(isset($_POST['submit']))
        {
            Tpl::$vars['errors'] = [];

    // проверям логин
            if(!preg_match("/^[a-zA-Z0-9]+$/",$_POST['login']))
            {
                Tpl::$vars['errors'][] = "Логин может состоять только из букв английского алфавита и цифр";
            }

            if(strlen($_POST['login']) < 3 or strlen($_POST['login']) > 30)
            {
                Tpl::$vars['errors'][] = "Логин должен быть не меньше 3-х символов и не больше 30";
            }

    // Если нет ошибок, то меняем в БД данные пользователя
            if(count(Tpl::$vars['errors']) == 0)
            {
                $id = $_SESSION['user']['id'];
                $login = $_POST['login'];
                $email = $_POST['email'];
        // Убераем лишние пробелы и делаем двойное хеширование
                $password = md5(md5(trim($_POST['password'])));

                mysqli_query(Sql::$link, "UPDATE users SET user_login = '".$login."', user_email = '".$email."', user_password = '".$password."' WHERE user_id = '".$id."'");

                $_SESSION['user']['login'] = $login;
                $_SESSION['user']['email'] = $email;
                print "<b>Изменения были произведены, спасибо";
                exit();
            }
            else
            {
                print "<b>При регистрации произошли следующие ошибки:</b><br>";
                foreach(Tpl::$vars['errors'] AS $error)
                {
                    print $error."<br>";
                }
            }
        }

    }         
    
}

?>