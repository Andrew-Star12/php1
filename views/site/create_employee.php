<section class="create-employee">
    <h2>Добавить сотрудника</h2>
    <h3><?= $message ?? ''; ?></h3>

    <form method="POST">
        <div class="form-group">
            <label>Имя</label>
            <input type="text" name="FirstName" placeholder="Введите имя">
        </div>

        <div class="form-group">
            <label>Фамилия</label>
            <input type="text" name="LastName" placeholder="Введите фамилию">
        </div>

        <div class="form-group">
            <label>Отчество</label>
            <input type="text" name="Patronymic" placeholder="Введите отчество">
        </div>

        <div class="form-group">
            <label>Пол</label>
            <div>
                <label>
                    <input type="radio" name="Gender" value="Мужской"> Мужской
                </label>
                <label>
                    <input type="radio" name="Gender" value="Женский"> Женский
                </label>
            </div>
        </div>

        <div class="form-group">
            <label>Дата рождения</label>
            <input type="date" name="DateOfBirth">
        </div>

        <div class="form-group">
            <label>Адрес</label>
            <input type="text" name="Address" placeholder="Введите адрес">
        </div>

        <div class="form-group">
            <label>Должность</label>
            <input type="text" name="Position" placeholder="Введите должность">
        </div>

        <!-- 👇 Выбор кафедр -->
        <div class="form-group">
            <label>Кафедры</label>
            <select name="departments[]" multiple size="5">
                <?php if (!empty($departments)): ?>
                    <?php foreach ($departments as $department): ?>
                        <option value="<?= $department->id ?>"><?= $department->DepartmentName ?></option>
                    <?php endforeach; ?>
                <?php else: ?>
                    <option disabled>Нет доступных кафедр</option>
                <?php endif; ?>
            </select><br>
            <small>Удерживайте Ctrl (или Cmd) чтобы выбрать несколько</small>
        </div>

        <button class="create-button" type="submit">Создать сотрудника</button>
    </form>
</section>


<style>
    /* Контейнер для формы */
    .create-employee {
        background-color: white;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        padding: 20px;
        max-width: 700px;
        width: 100%;
        margin: auto;
    }

    /* Заголовки */
    h2 {
        text-align: center;
        color: #333;
        font-size: 24px;
        margin-bottom: 20px;
    }

    h3 {
        color: red;
        text-align: center;
        font-size: 16px;
        margin-bottom: 20px;
    }

    /* Стиль для каждого поля формы */
    .form-group {
        margin: 15px auto;
        width: 80%;
    }

    label {
        display: block;
        font-weight: bold;
        color: #555;
        margin-bottom: 5px;
    }

    /* Поля ввода */
    input[type="text"],
    input[type="date"],
    input[type="radio"] {
        padding: 10px;
        font-size: 16px;
        border: 1px solid #ddd;
        border-radius: 4px;
        box-sizing: border-box;
        width: 100%;
    }

    input[type="radio"] {
        width: auto;
        margin-right: 10px;
    }

    input[type="text"]:focus,
    input[type="date"]:focus {
        border-color: #4CAF50;
        outline: none;
    }


    /* Стили для кнопки входа */
    button.create-button {
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

    button.create-button:hover:hover {
        background-color: #153c6d; /* Более темный синий при наведении */
    }
</style>