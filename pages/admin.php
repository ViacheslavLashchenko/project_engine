<?php

class Admin {
    
    public function login()
    {
        if (!empty($_POST)) {
            if (Tpl::$vars['errors'] != '') {
            //удаляем пробелы (или другие символы) из начала и конца строки
            $login = trim($_POST['login']);
            $password = trim($_POST['password']);

            $patternlog = '/^[a-z]+([-_]?[a-z0-9]+){0,2}$/';
            $patternpass = '/(?=.*[0-9])(?=.*[!@#$%^&*])(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z!@#$%^&*]{6,}/';

            if (!preg_match($patternlog, $login) || !preg_match($patternpass, $password)) {
                
                Tpl::$vars['errors'] = "<br>Вы ввели некорректный логин или пароль";
            }

            $result = Sql::sqlQuery("SELECT * FROM `users` WHERE `first_name` = '$login'", __FILE__,__LINE__);
            //извлекаем из базы из таблицы зарегистрированных пользователей все данные о пользователе с введенным логином
            $row = $result->fetch_assoc();
            //если пользователя с введенным логином не существует
            if (empty($row)) {
                Tpl::$vars['errors'] = "<br /><br />Извините, введённый вами логин или пароль неверный";
            } else {
                //если существует, то сверяем пароли
                if ($row['pass'] == $password) {
                    //если пароли совпадают, то запускаем данному пользователю сессию
                    $_SESSION['first_name'] = $row['first_name']; 
                    //Выводим информацию, что пользователь авторизован и снизу ссылку для перехода на главную страницу (можно на любую поставить ссылку)
                    echo "<br /><br />Поздравляем! Вы успешно вошли на сайт! <br /><a href='index.php'>Главная страница</a><br /><a href='reg.php'>Регистрация</a>";
                } else {
                    //если пароли не совпали, выводим на экран информацию об этом и пользователя не авторизовываем
                    Tpl::$vars['errors'] = "<br /><br />Извините, введённый вами логин или пароль неверный!";
                }
            }

            } else {
                header('Location: ' . ROOT_URL . ADMIN_PAGE . '/info'); 
            }
        }
    }

    public function info()
    {
        
    }
}
?>