<?php if ($page !== "/user/registration/"): ?>
    <?php if (!$auth): ?>
        <div>
            <form method="post" action="/user/login/">
                <label for="login">Логин:</label>
                <input type="text" name="login" id="login">
                <label for="password">Пароль</label>
                <input type="password" name="password" id="password">
                <label for="learn">Запомнить</label>
                <input type="checkbox" mane="learn" id="learn">
                <input type="submit" name="send">
            </form>
            <button><a href="/user/registration/" type="button">Регистрация</a></button>
        </div>
    <? else : ?>
        <h2>Добро пожаловать <?= $user ?></h2>
        <a href="/user/logout/">Выход</a><br>
    <?php endif; ?>
<?php endif; ?>
<div>
    <menu>
        <a href="/">Главная</a>
        <a href="/product/catalog/">Каталог</a>
        <a href="/cart">Корзина(<span id="countOfInCart"><?= $countOfInCart ?></span>)</a>
        <a href="/task">Задачи</a>
    </menu>
</div>