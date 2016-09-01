    <section id="form_input">
        <div class="container">
            <div class="row">
                <div class="col-md8 col-md-offset-1">
                    <form method=POST action="">
                        <div class="form-inline">
                            <input type="text" name="login" class="form-control" placeholder="Введите логин" value="<?php echo @$fdata['login'];?>">
                        </div>
                        <div class="form-inline">
                            <input type="password" name="password" class="form-control" placeholder="Введите пароль">
                        </div>
                        <!--                            <div class="form-inline">-->
                        <!--                                <label for="exampleInputFile">Загрузить изображение</label>-->
                        <!--                                <input type="file" id="avatar">-->
                        <!--                            </div>-->
                        <button type="submit" name="enter" class="btn btn-default navbar-btn" value="Вход">Вход</button>
                    </form>
                </div>
            </div>
        </div>
    </section>