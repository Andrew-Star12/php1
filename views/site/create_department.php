<section class="create-department">
    <h2>Добавить кафедру</h2>
    <h3><?= $message ?? ''; ?></h3>

    <form method="POST">
        <label>
            Название кафедры
            <input type="text" name="DepartmentName" placeholder="Введите название">
        </label>
        <button class="create-button" type="submit">Добавить</button>
    </form>
</section>

<style>
    .create-department {
        background-color: #fff;
        padding: 20px;
        margin: 20px auto;
        border-radius: 8px;
        max-width: 400px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .create-department h2 {
        text-align: center;
    }

    .create-department input[type="text"] {
        width: 100%;
        padding: 10px;
        margin-top: 8px;
        margin-bottom: 16px;
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    .create-button {
        display: inline-block;
        padding: 10px 20px;
        font-size: 16px;
        font-weight: bold;
        color: #fff;
        background: linear-gradient(135deg, #4e73df, #1e3a8a);
        border-radius: 8px;
        text-decoration: none;
        transition: background 0.3s ease, transform 0.3s ease;
        margin: auto;
        cursor: pointer;
    }

    .create-button:hover {
        background: linear-gradient(135deg, #1e3a8a, #4e73df);
        transform: scale(1.05);
    }

</style>