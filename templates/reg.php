            <section class="container inform">
                <div class="row">
                    <div class="col-lg"></div>
                    <div class="col-lg">
                        <form method="post" id="register-form" novalidate>
                            <label>Введите данные для регистрации</label>
                            <input type="text" name="login" class="el_form" id="text-name" aria-describedby="loginHelp" placeholder="login">
                            <div class="error-box"></div>
                            <input type="text" name="email" class="el_form" id="text-email" aria-describedby="emailHelp" placeholder="email">
                            <div class="error-box"></div>
                            <input type="pas" name="password" class="el_form" id="text-password" placeholder="password">
                            <div class="error-box"></div>
                            <input name="submit" type="submit" id="submitForm" value="Зарегестрироватся">
                        </form>
                    </div>
                    <div class="col-lg"></div>
                </div>
                <div class="row">
                    <div class="col-lg"></div>
                    <div class="col-lg"><a class="register_link" href="<?php echo ROOT_URL . ADMIN_PAGE . '/login'?>">Вход</a></div>
                    <div class="col-lg"></div>
                </div>
            </section>