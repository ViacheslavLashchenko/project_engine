<section class='container inform'>
    <div class='row'>
        <div class='col-lg'></div>
        <div class='col-lg'>
            <form method="post" id="login-form" novalidate>
                <label>Введите данные для входа</label>
                <input id="text-login" class="el_form" type="text" name="login" size="40" placeholder="login">
                <div class="error-box"></div>
                <input id="text-password" class="el_form" type="pas" name="password" size="40" placeholder="password">
                <div class="error-box"></div>
                <input id="submitForm" type="submit" value="Войти">
            </form>
            <a class="register_link" href="<?php echo ROOT_URL . ROOT_PAGE . '/registration'?>">Регистрация</a>
        </div>
        <div class='col-lg'></div>
    </div>
</section>