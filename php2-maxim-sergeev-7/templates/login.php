<?php if (!$_SESSION["id_user"]): ?>
    <form action="" method="post">
        <div>
            Логин:<input name="login" type="text"/>
        </div>
        <div>
            Пароль: <input name="password" type="password"/>
        </div>
        <div>
            <input value="Войти" type="submit"/>
            <a href="#">Регистрация</a>
        </div>

    </form>
<?php endif; ?>

<?php if ($_SESSION["id_user"]): ?>
    <form action="" method="post">
        <p>Вы авторизованы под логином <?= $_SESSION["login"] ?></p>
        <a href="/privateOffice">Личный кабинет</a>
        <input type="submit" name="ExitLogin" value="Выйти"/>
    </form>
<?php endif; ?>