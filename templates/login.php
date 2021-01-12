<section class='container inform'>
    <div class='row'>
        <div class='col-lg'></div>
        <div class='col-lg'>
            <form method="post" id="logins-form" novalidate>
                <label>Введите данные для входа</label>
                <input id="text-name" class="el_form" type="text" name="name" size="40" placeholder="login">
                <div class="error-box"></div>
                <input id="text-email" class="el_form" type="email" name="email" size="40" placeholder="email">
                <div class="error-box"></div>
                <input id="submitForm" type="submit" value="Войти">
            </form>
            <a class="register_link" href="<?php echo ROOT_URL . ADMIN_PAGE . '/reg'?>">Регистрация</a>
        </div>
        <div class='col-lg'></div>
    </div>
</section>