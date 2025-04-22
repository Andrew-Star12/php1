<section class="register">
    <h2>Регистрация нового пользователя</h2>
    <h3><?= $message ?? ''; ?></h3>

    <form method="post">
        <label>Имя <input type="text" name="name"></label>
        <label>Логин <input type="text" name="login"></label>
        <label>Пароль <input type="password" name="password"></label>
        <button class="register-button" type="submit">Зарегистрироваться</button>
    </form>
</section>

<style>
    .register {
        background-color: #cce0ff; /* Голубой фон */
        border-radius: 0 0 40px 40px; /* Закругленные только нижние углы */
        padding: 100px 12%;
        box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1); /* Легкая тень */
        width: 50%;
        margin: auto;
        height: 80vh;
        max-height: 500px;
    }

    .register form {
        display: flex;
        flex-direction: column;
        gap: 10px;
        font-size: 18px;
    }

    .register input[type="text"], .register input[type="password"] {
        padding: 10px;
        font-size: 16px;
        border-radius: 5px;
        border: 1px solid #a3c4f7; /* Светло-голубая граница */
        width: 100%;
    }

    .register button.register-button {
        padding: 10px;
        font-size: 16px;
        color: white;
        background-color: #1e3a8a; /* Темный синий фон */
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s;
        width: 40%;
        margin: auto;
    }

    .register button.register-button:hover {
        background-color: #153c6d; /* Более темный синий при наведении */
    }
</style>
