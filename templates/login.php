<?php
    if(isset($_SESSION['first_name'])) {
        $login = 'Здравствуйте, '.$_SESSION['first_name'].'!';
    }
// Проверяем, пусты ли переменные логина и id пользователя
// Если пусты, то
    if (empty($_SESSION['login']) || empty($_SESSION['first_name'])) {
        echo "
        <div class='alert alert-primary center' role='alert'>Вы вошли на сайт, как гость</div><br>
            <div class='container'>
                <div class='row'>
                    <div class='col-lg'></div>
                    <div class='col-lg'>
                    <div class='errors'>
                    </div>
                        <form action='' method='post'>
                            <div class='form-group'>
                                <label for='exampleInputEmail1'>Логин</label>
                                <input type='text' name='login' class='form-control' id='exampleInputLogin1' aria-describedby='loginHelp' placeholder='Введите логин'>
                                <small id='loginHelp' class='form-text text-muted'>Мы никогда не передадим вашу электронную почту кому-либо еще.</small>
                            </div>
                            <div class='form-group'>
                                <label for='exampleInputPassword1'>Пароль</label>
                                <input type='password' name='password' class='form-control' id='exampleInputPassword1' placeholder='Введите пароль'>
                            </div>
                            <div class='form-check'>
                                <input type='checkbox' class='form-check-input' id='exampleCheck1'>
                                <label class='form-check-label' for='exampleCheck1'>Запомнить выбор</label>
                            </div>
                            <button type='submit' class='btn btn-primary'>Отправить</button>
                        </form>
                    </div>
                    <div class='col-lg'></div>
                </div>
                <div class='row'>
                    <div class='col-lg'></div>
                    <div class='col-lg'><a href='#'>Регистрация</a></div>
                    <div class='col-lg'></div>
                </div>
            </div>";
    }

?>