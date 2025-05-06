<section class="list-departments">
    <h2>Список кафедр</h2>

    <?php if (count($departments) > 0): ?>
        <div class="department-list">
            <?php foreach ($departments as $department): ?>
                <div class="department-card">
                    <div class="card-header">
                        <h3><?= $department->DepartmentName ?></h3>
                        <a class="edit-button" href="<?= app()->route->getUrl('/department/edit/' . $department->id) ?>">Редактировать</a>
                    </div>
                    <p><strong>Сотрудники:</strong></p>

                    <?php if (count($department->employees) > 0): ?>
                        <ul class="teacher-list">
                            <?php foreach ($department->employees as $employee): ?>
                                <li><?= $employee->LastName ?> <?= $employee->FirstName ?> <?= $employee->Patronymic ?></li>
                            <?php endforeach; ?>
                        </ul>
                    <?php else: ?>
                        <p class="empty">Нет назначенных сотрудников</p>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
        </div>
    <?php else: ?>
        <p class="empty">Кафедры не найдены.</p>
    <?php endif; ?>
</section>



<style>
    .list-departments {
        max-width: 900px;
        margin: 40px auto;
        padding: 20px;
        background-color: #f7fbff;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0,0,0,0.05);
        font-family: 'Segoe UI', sans-serif;
    }

    .list-departments h2 {
        text-align: center;
        color: #2c3e50;
        margin-bottom: 30px;
        font-size: 28px;
    }

    .department-list {
        display: flex;
        flex-direction: column;
        gap: 20px;
    }

    .department-card {
        background-color: #ffffff;
        padding: 20px;
        border-left: 5px solid #3498db;
        border-radius: 8px;
        transition: box-shadow 0.3s ease;
    }

    .department-card:hover {
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
    }

    .department-card h3 {
        margin: 0 0 10px;
        color: #34495e;
        font-size: 22px;
    }

    .teacher-list {
        padding-left: 20px;
        margin: 10px 0 0;
        list-style-type: disc;
    }

    .teacher-list li {
        margin-bottom: 5px;
        color: #2c3e50;
        font-size: 15px;
    }

    .empty {
        color: #999;
        font-style: italic;
        margin-top: 10px;
    }
    .card-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .edit-button {
        font-size: 14px;
        color: #2980b9;
        text-decoration: none;
        padding: 6px 10px;
        border: 1px solid #2980b9;
        border-radius: 4px;
        transition: 0.2s;
    }

    .edit-button:hover {
        background-color: #2980b9;
        color: white;
    }

</style>

