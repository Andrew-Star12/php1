<section class="create-department">
    <h2>Добавить кафедру</h2>
    <?php if (!empty($message)): ?>
        <div class="form-message"><?= $message ?></div>
    <?php endif; ?>

    <form method="POST">
        <div class="form-group">
            <label for="DepartmentName">Название кафедры</label>
            <input type="text" id="DepartmentName" name="DepartmentName" placeholder="" required>
        </div>

        <div class="form-group">
            <label for="employees">Сотрудники кафедры</label>
            <select name="employees[]" multiple size="6">
                <?php foreach ($employees as $employee): ?>
                    <option value="<?= $employee->id ?>">
                        <?= $employee->LastName . ' ' . $employee->FirstName . ' ' . $employee->Patronymic ?>
                    </option>
                <?php endforeach; ?>
            </select>
            <small>* Зажмите Ctrl (Cmd) для выбора нескольких</small>
        </div>

        <button type="submit" class="submit-btn">Сохранить</button>
    </form>
</section>


<style>
    .create-department {
        max-width: 600px;
        margin: 40px auto;
        padding: 30px;
        background-color: #f2f9ff;
        border-radius: 10px;
        box-shadow: 0 0 12px rgba(0, 0, 0, 0.05);
        font-family: 'Segoe UI', sans-serif;
    }

    .form-container h2 {
        text-align: center;
        color: #2c3e50;
        margin-bottom: 25px;
    }

    .form-message {
        background-color: #fdecea;
        border-left: 5px solid #e74c3c;
        color: #c0392b;
        padding: 10px 15px;
        margin-bottom: 20px;
        border-radius: 4px;
        font-weight: bold;
    }

    .form-group {
        margin-bottom: 20px;
    }

    label {
        display: block;
        font-weight: bold;
        margin-bottom: 8px;
        color: #34495e;
    }

    input[type="text"],
    select {
        width: 100%;
        padding: 10px 12px;
        border: 1px solid #ccc;
        border-radius: 6px;
        font-size: 15px;
        background-color: #fff;
        transition: border-color 0.3s;
    }

    input[type="text"]:focus,
    select:focus {
        border-color: #3498db;
        outline: none;
    }

    select {
        height: auto;
    }

    small {
        color: #777;
        font-size: 0.85em;
    }

    .submit-btn {
        width: 100%;
        background-color: #3498db;
        color: white;
        border: none;
        padding: 12px 0;
        border-radius: 6px;
        font-size: 16px;
        font-weight: bold;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    .submit-btn:hover {
        background-color: #2980b9;
    }
</style>
