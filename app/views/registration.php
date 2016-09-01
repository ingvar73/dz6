<?php
/**
 * Created by PhpStorm.
 * User: ingvar73
 * Date: 30.08.2016
 * Time: 23:08
 */
//require_once './vendor/twbs/autoload.php';
?>

<!DOCTYPE html>
<html lang="ru-RU">
<head>
    <meta charset="UTF-8">
    <title>Система регистрации и авторизации</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/main.css" media="screen, projection, print">
</head>
<body>
<div class="wrapper">

    <section id="header">
        <div class="container">
            <div class="page-header">
                <h1>Система регистрации и авторизации</h1>
            </div>
        </div>
    </section>

    <section id="form_input">
        <div class="container">
            <div class="row">
                <div class="col-md8 col-md-offset-1">
                    <form method=POST action="" enctype="multipart/form-data">
                        <div class="form-inline">
                            <input type="text" name="login" class="form-control" placeholder="| Login" value="<?php echo @$fdata['login'];?>">
                        </div><br />
                        <div class="form-inline">
                            <input type="text" name="name" class="form-control" placeholder="| Имя" value="<?php echo @$fdata['name'];?>">
                        </div><br />
                        <div class="form-inline">
                            <input type="text" name="age" class="form-control" placeholder="| Ваш возраст" value="<?php echo @$fdata['age'];?>">
                        </div><br />
                        <div class="form-inline">
                            <textarea rows="10" name="about" cols="23" placeholder="| О себе" value="<?php echo @$fdata['about'];?>"></textarea>
                        </div><br />
                        <div class="form-inline">
                            <input type="password" name="password" class="form-control" placeholder="| Пароль">
                        </div><br />
                        <div class="form-inline">
                            <input type="password" name="password1" class="form-control" placeholder="| Повторите пароль">
                        </div><br />
                        <div class="form-inline">
                            <label for="InputFile">Загрузить изображение</label>
                            <input type="file" name="avatar">
                        </div><br />
                        <button type="submit" name="enter" class="btn btn-default" value="Регистрация">Регистрация</button>
                    </form>
                </div>
            </div>
        </div>
    </section>


    <div class="container">

    </div>
</div>
<div class="empty"></div>
<div class="footer">
</div>

<script src="http://code.jquery.com/jquery-3.1.0.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/main.js"></script>

</body>
</html>
