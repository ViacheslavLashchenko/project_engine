<?php

class Index {
    
    public function home()
    {
        
    }

    public function big_size()
    {
     
    }

    public function bouffant()
    {
     
    }

    public function cocktail()
    {
     
    }

    public function evening()
    {
     
    }

    public function long()
    {
     
    }

    public function new()
    {
     
    }

    public function contacts()
    {
     
    }

    public function registration()
    {
// Страница регистрации нового пользователя

// Соединямся с БД

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

    // проверяем, не сущестует ли пользователя с таким именем
            $query = mysqli_query(Sql::$link, "SELECT user_id FROM users WHERE user_login='".mysqli_real_escape_string(Sql::$link, $_POST['login'])."'");
            if(mysqli_num_rows($query) > 0)
            {
                Tpl::$vars['errors'][] = "Пользователь с таким логином уже существует в базе данных";
            }

    // Если нет ошибок, то добавляем в БД нового пользователя
            if(count(Tpl::$vars['errors']) == 0)
            {
                $levelUser = 1;
                $login = $_POST['login'];
                $email = $_POST['email'];

        // Убераем лишние пробелы и делаем двойное хеширование
                $password = md5(md5(trim($_POST['password'])));

                mysqli_query(Sql::$link,"INSERT INTO users SET user_login = '".$login."', user_email = '".$email."', user_password = '".$password."', user_level = '".$levelUser."'");
                header("Location: login"); exit();
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

    public function login()
    {
 // Страница авторизации

// Функция для генерации случайной строки
        function generateCode($length=6) {
            $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHI JKLMNOPRQSTUVWXYZ0123456789";
            $code = "";
            $clen = strlen($chars) - 1;
            while (strlen($code) < $length) {
                $code .= $chars[mt_rand(0,$clen)];
            }
            return $code;
        }

        if(!empty($_POST))
        {
    // Вытаскиваем из БД запись, у которой логин равняеться введенному
            $query = mysqli_query(Sql::$link,"SELECT user_login, user_id, user_password, user_level FROM users WHERE user_login='".mysqli_real_escape_string(Sql::$link,$_POST['login'])."' LIMIT 1");
            $data = mysqli_fetch_assoc($query);

    // Сравниваем пароли
            if($data['user_password'] === md5(md5($_POST['password'])))
            {
        // Генерируем случайное число и шифруем его
                $hash = md5(generateCode(10));

                if(!empty($_POST['not_attach_ip']))
                {
            // Если пользователя выбрал привязку к IP
            // Переводим IP в строку
                    $insip = ", user_ip=INET_ATON('".$_SERVER['REMOTE_ADDR']."')";
                }

        // Записываем в БД новый хеш авторизации и IP
                mysqli_query(Sql::$link, "UPDATE users SET user_hash='".$hash."' ".$insip." WHERE user_id='".$data['user_id']."'");

        // Записываем в сессию логин пользователя и время входа
                $_SESSION['user']['login'] = $data['user_login'];
                $_SESSION['user']['id'] = $data['user_id'];
                $_SESSION['user']['email'] = $data['user_email'];
                $_SESSION['user']['level'] = $data['user_level'];
        // Ставим куки
                setcookie("id", $data['user_id'], time()+60*60*24*30, "/");
        setcookie("hash", $hash, time()+60*60*24*30, "/", null, null, true); // httponly !!!

        // Переадресовываем браузер на страницу проверки нашего скрипта
        header("Location:" . ROOT_URL . ADMIN_PAGE . "/info"); exit();
        }
        else
        {
            print "Вы ввели неправильный логин/пароль";
        }
        }

    }
    
}

?>