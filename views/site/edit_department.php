<section class="edit-department">
    <h2>Редактировать кафедру</h2>

    <?php if (!empty($message)): ?>
        <div class="form-message"><?= $message ?></div>
    <?php endif; ?>

    <form method="POST" action="<?= app()->route->getUrl('/department/update/' . $department->id) ?>">
        <div class="form-group">
            <label for="DepartmentName">Название кафедры</label>
            <input type="text" id="DepartmentName" name="DepartmentName"
                   value="<?= $department->DepartmentName ?>" required>
        </div>

        <div class="form-group">
            <label for="employees">Сотрудники кафедры</label>
            <select name="employees[]" multiple size="6">
                <?php foreach ($employees as $employee): ?>
                    <option value="<?= $employee->id ?>"
                        <?= in_array($employee->id, $department->employees->pluck('id')->toArray()) ? 'selected' : '' ?>>
                        <?= $employee->LastName ?> <?= $employee->FirstName ?> <?= $employee->Patronymic ?>
                    </option>
                <?php endforeach; ?>
            </select>
            <small>* Зажмите Ctrl (Cmd) для выбора нескольких</small>
        </div>

        <button type="submit" class="submit-btn">Сохранить</button>
    </form>
</section>


<style>
    .edit-department {
        max-width: 700px;
        margin: 40px auto;
        padding: 25px;
        background-color: #f9fcff;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0,0,0,0.05);
        font-family: 'Segoe UI', sans-serif;
    }

    .edit-department h2 {
        text-align: center;
        color: #2c3e50;
        margin-bottom: 25px;
        font-size: 26px;
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-group label {
        display: block;
        margin-bottom: 8px;
        font-weight: 600;
        color: #34495e;
    }

    .form-group input[type="text"],
    .form-group select {
        width: 100%;
        padding: 10px;
        font-size: 15px;
        border: 1px solid #ccc;
        border-radius: 5px;
        box-sizing: border-box;
        transition: border 0.3s ease;
    }

    .form-group input:focus,
    .form-group select:focus {
        border-color: #3498db;
        outline: none;
    }

    .form-group small {
        color: #7f8c8d;
        font-style: italic;
        margin-top: 5px;
        display: block;
    }

    .form-message {
        color: #e74c3c;
        font-weight: bold;
        text-align: center;
        margin-bottom: 20px;
    }

    .submit-btn {
        display: block;
        width: 100%;
        padding: 12px;
        background-color: #3498db;
        border: none;
        color: white;
        font-size: 16px;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .submit-btn:hover {
        background-color: #2980b9;
    }
</style>
