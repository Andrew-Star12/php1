<section  class="d-f content-main">
    <div class="employee">
        <h3>Педагогический состав</h3>
        <div>
            <a class="create-employee" href="<?= app()->route->getUrl('/employee/create') ?>">Добавить сотрудника</a><br>
            <a class="create-employee" href="<?= app()->route->getUrl('/employees') ?>">Список сотрудников</a>
        </div>
    </div>
    <div class="department">
        <h3>Кафедры</h3>
        <a class="create-employee" href="<?= app()->route->getUrl('/department/create') ?>">Добавить кафедру</a><br>
        <a class="create-employee" href="<?= app()->route->getUrl('/departments') ?>">Список кафедр</a>
    </div>
    <div class="department">
        <h3>Дисциплины</h3>
        <a class="create-employee" href="<?= app()->route->getUrl('/disciplines/create') ?>">Добавить дисциплину</a><br>
        <a class="create-employee" href="<?= app()->route->getUrl('/disciplines') ?>">Список дисциплин</a>
    </div>
    <div></div>
</section>

<style>
    .employee{
        width: auto;
        height: 400px;
        background-color: #a3c4f7;
        border: 2px solid #1e3a8a;
        border-radius: 20px;
        margin: 40px auto;
        padding: 0 30px;
    }
    .d-f{
        display: flex;
    }
    .content-main{
        width: 100%;
    }

    .create-employee {
        display: inline-block;
        padding: 10px 20px;
        font-size: 16px;
        font-weight: bold;
        color: #fff;
        background: linear-gradient(135deg, #4e73df, #1e3a8a); /* Градиент от синего к темному синему */
        border-radius: 8px;
        text-decoration: none;
        transition: background 0.3s ease, transform 0.3s ease; /* Плавные анимации */
        margin: auto;
    }

    .create-employee:hover {
            background: linear-gradient(135deg, #1e3a8a, #4e73df); /* Поменять градиент при наведении */
            transform: scale(1.05); /* Немного увеличим ссылку при наведении */
    }

    .create-employee:active {
        background: #1e3a8a; /* Цвет фона при нажатии */
    }

    h3{
        font-size: 28px;
        text-align: center;
        padding: 20px 0;
    }
    .employee > div{
        display: flex;
        flex-direction: column;
     }

    .department{
        width: auto;
        height: 400px;
        background-color: #a3c4f7;
        border: 2px solid #1e3a8a;
        border-radius: 20px;
        margin: 40px auto;
        padding: 0 60px;
    }
</style>