<div class="container">
    <div class="block">
        <div class="text">
            <h1>Вы авторизованы!</h1>
            <h3>
                <?php
                if (isset($data['avatar']) or $data['avatar'] == ''){


                    if (isset($_COOKIE['login'])) //есть ли переменная с логином в COOKIE. Должна быть,
                        // если пользователь при предыдущем входе нажал на чекбокс "Запомнить меня"
                    {
                        //если да, то вставляем в форму ее значение. При этом пользователю отображается,
                        // что его логин уже вписан в нужную графу
                        echo    ' value="'.$_COOKIE['login'].'">';
                    }

print <<<HERE

<!-- Между оператором "print <<<HERE" выводится html код с нужными переменными из php -->
            Вы вошли на сайт, как $_SESSION[login] (<a href='/'>выход</a>)<br>
            <!-- выше ссылка на выход из аккаунта -->

            Ваш аватар:<br>
            <img alt='$_SESSION[login]' src='../$data[avatar]'>
HERE;
                }
                ?></h3>
        </div>
    </div>
</div>
