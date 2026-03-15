    <h2><?= $title ?></h2>

    <form action="/user/registration/" method="post">
        <label for="login">Логин:</label>
        <input required type="text" name="login" id="login">
        <label for="password">Пароль:</label>
        <input required type="password" name="password1" id="password1">
        <label for="password">Повторите пароль:</label>
        <input required type="password" name="password2" id="password2">
        <input type="submit" value="Регистрация">
    </form>