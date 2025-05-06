<section class="edit-discipline">
    <h2>Редактировать дисциплину</h2>

    <?php if (!empty($message)) : ?>
        <div class="form-message"><?= $message ?></div>
    <?php endif; ?>

    <form method="POST" action="<?= app()->route->getUrl('/discipline/update/' . $discipline->id) ?>">
        <div class="form-group">
            <label for="DisciplineName">Название дисциплины:</label>
            <input type="text" id="DisciplineName" name="DisciplineName" value="<?= $discipline->DisciplineName ?>">
        </div>

        <div class="form-group">
            <label>Сотрудники:</label>
            <div class="checkbox-list">
                <?php foreach ($employees as $employee): ?>
                    <label>
                        <input type="checkbox" name="employees[]" value="<?= $employee->id ?>"
                            <?= in_array($employee->id, $discipline->employees->pluck('id')->toArray()) ? 'checked' : '' ?>>
                        <?= $employee->LastName ?> <?= $employee->FirstName ?>
                    </label>
                <?php endforeach; ?>
            </div>
        </div>

        <button type="submit" class="submit-btn">Сохранить</button>
    </form>
</section>


<style>
    .edit-discipline {
        max-width: 700px;
        margin: 40px auto;
        padding: 25px;
        background-color: #f9fcff;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0,0,0,0.05);
        font-family: 'Segoe UI', sans-serif;
    }

    .edit-discipline h2 {
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
        font-weight: 600;
        color: #34495e;
        margin-bottom: 8px;
    }

    .form-group input[type="text"] {
        width: 100%;
        padding: 10px;
        font-size: 15px;
        border: 1px solid #ccc;
        border-radius: 5px;
        box-sizing: border-box;
        transition: border 0.3s ease;
    }

    .form-group input[type="text"]:focus {
        border-color: #3498db;
        outline: none;
    }

    .checkbox-list {
        display: flex;
        flex-direction: column;
        gap: 8px;
        margin-top: 10px;
        padding-left: 5px;
    }

    .checkbox-list label {
        display: flex;
        align-items: center;
        gap: 8px;
        font-size: 15px;
        color: #2c3e50;
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
        margin-top: 20px;
    }

    .submit-btn:hover {
        background-color: #2980b9;
    }
</style>
