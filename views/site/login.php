<section class="login">
    <h2>Авторизация</h2>
    <h3><?= $message ?? ''; ?></h3>

    <!-- Если пользователь авторизован, показываем его имя -->
    <h3><?= app()->auth->user()->name ?? ''; ?></h3>

    <?php
    // Если пользователь не авторизован, показываем форму входа
    if (!app()->auth::check()):
        ?>
        <form method="post">
            <label>Логин <input type="text" name="login"></label>
            <label>Пароль <input type="password" name="password"></label>
            <button class="login-button" type="submit">Войти</button>
        </form>
    <?php endif; ?>
</section>



<style>
    * {
        margin: 0;
        padding: 0;
        border: 0;
        box-sizing: border-box;
    }

    body {
        background: linear-gradient(135deg, #e6f2ff, #cce0ff); /* Легкий голубой градиент */
        height: 100vh; /* Чтобы контент занимал всю высоту экрана */
        display: flex;
        flex-direction: column; /* Расположим элементы вертикально */
    }

    /* Стили для header и навигации */
    header {
        background-color: #1e3a8a; /* Темный синий фон */
        color: white;
        padding: 10px 0;
        width: 50%;
        margin: auto;
    }

    nav ul {
        list-style-type: none;
        display: flex;
        justify-content: center;
        gap: 20px;
        padding: 0;
    }

    nav ul li {
        display: inline;
    }

    nav ul li a {
        color: white;
        text-decoration: none;
        font-size: 18px;
        padding: 10px 15px;
        transition: background-color 0.3s;
    }

    nav ul li a:hover {
        background-color: #4C8BF5; /* Синий при наведении */
        border-radius: 5px;
    }

    /* Стили для основной секции */
    main {
        flex: 1;
    }

    /* Плашка с закругленными углами, голубым фоном и тенью */
    .login {
        flex: 1;
        background-color: #cce0ff; /* Голубой фон */
        border-radius: 0 0 40px 40px; /* Закруглены только нижние углы */
        padding: 100px 12%;
        box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1); /* Легкая тень */
        width: 50%;
        margin: auto;
        height: 80vh;
        max-height: 500px;
    }

    /* Стили для формы */
    form {
        display: flex;
        flex-direction: column;
        gap: 10px;
        font-size: 18px;
    }

    /* Стили для input */
    input[type="text"], input[type="password"] {
        padding: 10px;
        font-size: 16px;
        border-radius: 5px;
        border: 1px solid #a3c4f7; /* Светло-голубая граница */
        width: 100%;
    }

    /* Заголовок формы */
    h2 {
        font-size: 36px;
        margin-bottom: 10px;
        text-align: center;
    }

    /* Стили для кнопки входа */
    button.login-button {
        padding: 10px;
        font-size: 16px;
        color: white;
        background-color: #1e3a8a; /* Темный синий фон */
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s;
        width: 20%;
        margin: auto;
    }

    button.login-button:hover {
        background-color: #153c6d; /* Более темный синий при наведении */
    }

    /* Стили для футера */
    footer {
        background-color: #1e3a8a; /* Темный синий фон */
        color: white;
        padding: 20px 0;
        text-align: center;
        margin-top: auto; /* Чтобы футер всегда находился внизу */
    }

    .footer-content {
        max-width: 1200px;
        margin: 0 auto;
    }

    footer p {
        font-size: 14px;
        margin-bottom: 10px;
    }

    footer ul {
        list-style-type: none;
        display: flex;
        justify-content: center;
        gap: 30px;
        padding: 0;
        margin-bottom: 0;
    }

    footer ul li {
        display: inline;
    }

    footer ul li a {
        color: white;
        text-decoration: none;
        font-size: 16px;
        transition: color 0.3s, border-bottom 0.3s;
        padding-bottom: 2px;
    }

    footer ul li a:hover {
        color: #4C8BF5; /* Светлый синий при наведении */
        border-bottom: 2px solid #4C8BF5; /* Линия под ссылкой */
    }

</style>
