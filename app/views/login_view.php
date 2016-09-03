    <section id="form_input">
        <div class="container">
            <div class="block">
                <div class="col-md8 col-md-offset-1">
                    <form method=POST action="login/log">
                        <div class="form-inline">
                            <input type="text" name="login" class="form-control" placeholder="Введите логин" value="<?php echo @$fdata['login'];?>">
                        </div>
                        <div class="form-inline">
                            <input type="password" name="password" class="form-control" placeholder="Введите пароль"><br />
                            <input type="checkbox" checked="checked" name="login"/>Оставаться в системе
                        </div>
                        <button type="submit" name="enter" class="btn btn-default navbar-btn" value="Вход">Вход</button>
                    </form><br />
                </div>
            </div>
        </div>
    </section>