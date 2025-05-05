<div class="container">
    <h2>Редактирование сотрудника</h2>

    <form method="POST" action="<?= app()->route->getUrl('/employee/update/' . $employee->id) ?>">
        <div class="form-group">
            <label>Имя:</label>
            <input type="text" name="FirstName" value="<?= $employee->FirstName ?>">
        </div>

        <div class="form-group">
            <label>Фамилия:</label>
            <input type="text" name="LastName" value="<?= $employee->LastName ?>">
        </div>

        <div class="form-group">
            <label>Отчество:</label>
            <input type="text" name="Patronymic" value="<?= $employee->Patronymic ?>">
        </div>

        <div class="form-group">
            <label>Пол:</label>
            <select name="Gender">
                <option value="M" <?= $employee->Gender === 'M' ? 'selected' : '' ?>>Мужской</option>
                <option value="F" <?= $employee->Gender === 'F' ? 'selected' : '' ?>>Женский</option>
            </select>
        </div>

        <div class="form-group">
            <label>Дата рождения:</label>
            <input type="date" name="DateOfBirth" value="<?= $employee->DateOfBirth ?>">
        </div>

        <div class="form-group">
            <label>Адрес:</label>
            <input type="text" name="Address" value="<?= $employee->Address ?>">
        </div>

        <div class="form-group">
            <label>Должность:</label>
            <input type="text" name="Position" value="<?= $employee->Position ?>">
        </div>

        <div class="form-group">
            <label>Кафедры:</label>
            <div class="checkbox-group">
                <?php foreach ($departments as $department): ?>
                    <label>
                        <input type="checkbox" name="departments[]" value="<?= $department->id ?>"
                            <?= in_array($department->id, $employee->departments->pluck('id')->toArray()) ? 'checked' : '' ?>>
                        <?= $department->DepartmentName ?>
                    </label>
                <?php endforeach; ?>
            </div>
        </div>

        <div class="form-group">
            <label>Дисциплины:</label>
            <div class="checkbox-group">
                <?php foreach ($disciplines as $discipline): ?>
                    <label>
                        <input type="checkbox" name="disciplines[]" value="<?= $discipline->id ?>"
                            <?= in_array($discipline->id, $employee->disciplines->pluck('id')->toArray()) ? 'checked' : '' ?>>
                        <?= $discipline->DisciplineName ?>
                    </label>
                <?php endforeach; ?>
            </div>
        </div>

        <button type="submit">Сохранить</button>
    </form>
</div>

<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f7fc;
        margin: 0;
        padding: 0;
    }

    .container {
        width: 60%;
        margin: 50px auto;
        background-color: #ffffff;
        padding: 30px;
        border-radius: 8px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }

    h2 {
        text-align: center;
        color: #333;
    }

    label {
        font-size: 14px;
        margin-bottom: 8px;
        display: block;
        color: #555;
    }

    input[type="text"],
    input[type="date"],
    select {
        width: 100%;
        padding: 8px;
        margin: 8px 0;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }

    input[type="checkbox"] {
        margin-right: 8px;
    }

    .form-group {
        margin-bottom: 20px;
    }

    .checkbox-group {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
    }

    .checkbox-group label {
        width: 45%;
    }

    button[type="submit"] {
        background-color: #007bff;
        color: white;
        border: none;
        padding: 12px 20px;
        border-radius: 4px;
        cursor: pointer;
        font-size: 16px;
        width: 100%;
        margin-top: 20px;
    }

    button[type="submit"]:hover {
        background-color: #0056b3;
    }

    .form-group:last-child {
        margin-bottom: 0;
    }

</style>
