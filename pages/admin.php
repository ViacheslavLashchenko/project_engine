<?php

class Admin {
    
    public function login()
    {
        if (empty($_POST)) {
           
        } else {
            header('Location: ' . ROOT_URL . ROOT_PAGE . '/home');
                // вывод сообщения
                echo 'Вы будете перенаправлены на главную страницу через 5 секунд.';
           
            // проверяем путсой ли Post масив, если да то выводим 
            //заносим введенный пользователем логин в переменную $login, если он пустой, то уничтожаем переменную
            if (isset($_POST['login'])) {
                $login = $_POST['login']; 
                if ($login == '') {
                    unset($login);
                }
            } 

            //заносим введенный пользователем пароль в переменную $password, если он пустой, то уничтожаем переменную
            if (isset($_POST['password'])) {
                $password=$_POST['password'];
                if ($password =='') { 
                    unset($password);
                } 
            }
            //если пользователь не ввел логин или пароль, то выдаём ошибку и останавливаем выполнение скрипта
            if (empty($login) || empty($password)) {
                exit ("Вы ввели не всю информацию, вернитесь назад и заполните все поля!");
            }

            //удаляем пробелы (или другие символы) из начала и конца строки
            $login = trim($login);
            $password = trim($password);

            $patternlog = '/^[a-z][-a-z_]*$/i';
            $patternpass = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]$/';

            // if (!preg_match($patternlog, $login) || !preg_match($patternpass, $password)) {
            //  exit ("<br>Вы ввели некорректный логин или пароль");
            // }

            $result = Sql::sqlQuery("SELECT * FROM `users` WHERE `first_name` = '$login'", __FILE__,__LINE__);
            //извлекаем из базы из таблицы зарегистрированных пользователей все данные о пользователе с введенным логином
            $row = $result->fetch_assoc();
            //если пользователя с введенным логином не существует
            if (empty($row['first_name'])) {
                exit ("<br /><br />Извините, введённый вами логин неверный");
            } else {
                //если существует, то сверяем пароли
                if (md5($row['pass']) == md5($password)) {
                    //если пароли совпадают, то запускаем данному пользователю сессию
                    $_SESSION['first_name'] = $row['first_name']; 
                    //Выводим информацию, что пользователь авторизован и снизу ссылку для перехода на главную страницу (можно на любую поставить ссылку)
                    echo "<br /><br />Поздравляем! Вы успешно вошли на сайт! <br /><a href='index.php'>Главная страница</a><br /><a href='reg.php'>Регистрация</a>";
                } else {
                    //если пароли не совпали, выводим на экран информацию об этом и пользователя не авторизовываем
                    exit ("<br /><br />Извините, введённый вами login или пароль неверный!");
                }
            }

        }
    }
}
?>