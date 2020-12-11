            <div class='container form-reg'>
                <div class='row'>
                    <div class='col-lg'></div>
                    <div class='col-lg'>
                    <div class='errors'>
                    </div>
                        <form method='post' id="register-form" novalidate>
                            <div class='form-group'>
                                <label for='exampleInputEmail1'>Логин</label>
                                <input type='text' name='login' class='form-control el_form' id='text-name' aria-describedby='loginHelp' placeholder='Введите логин'>
                                <div class="error-box"></div>
                                <small id='loginHelp' class='form-text text-muted'>Мы никогда не передадим вашу электронную почту кому-либо еще.</small>
                            </div>
                            <div class='form-group'>
                                <label for='exampleInputEmail1'>Email</label>
                                <input type='text' name='email' class='form-control el_form' id='text-email' aria-describedby='emailHelp' placeholder='Введите email'>
                                <div class="error-box"></div>
                                <small id='emailnHelp' class='form-text text-muted'>Мы никогда не передадим вашу электронную почту кому-либо еще.</small>
                            </div>
                            <div class='form-group'>
                                <label for='exampleInputPassword1'>Пароль</label>
                                <input type='password' name='password' class='form-control el_form' id='text-password' placeholder='Введите пароль'>
                                <div class="error-box"></div>
                            </div>
                            <div class='form-check'>
                                <input type='checkbox' class='form-check-input' id='exampleCheck1'>
                                <label class='form-check-label' for='exampleCheck1'>Запомнить выбор</label>
                            </div>
                            <button name='submit' type='submit' id='submitForm' class='btn btn-primary'>Зарегистрироватся</button>
                        </form>
                    </div>
                    <div class='col-lg'></div>
                </div>
                <div class='row'>
                    <div class='col-lg'></div>
                    <div class='col-lg'><a class="register_link" href='#'>Вход</a></div>
                    <div class='col-lg'></div>
                </div>
            </div>