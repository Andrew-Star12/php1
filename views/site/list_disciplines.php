<section class="list-disciplines">
    <h2>Список дисциплин</h2>

    <?php if (count($disciplines) > 0): ?>
        <div class="discipline-list">
            <?php foreach ($disciplines as $discipline): ?>
                <div class="discipline-card">
                    <div class="card-header">
                        <h3><?= $discipline->DisciplineName ?></h3>
                        <a class="edit-button" href="<?= app()->route->getUrl('/discipline/edit/' . $discipline->id) ?>">Редактировать</a>
                    </div>
                    <p><strong>Преподаватели:</strong></p>

                    <?php if (count($discipline->employees) > 0): ?>
                        <ul class="teacher-list">
                            <?php foreach ($discipline->employees as $employee): ?>
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
        <p class="empty">Дисциплины не найдены.</p>
    <?php endif; ?>
</section>

<style>
    .list-disciplines {
        max-width: 900px;
        margin: 40px auto;
        padding: 20px;
        background-color: #f7fbff;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0,0,0,0.05);
        font-family: Arial, sans-serif;
    }

    .list-disciplines h2 {
        text-align: center;
        color: #2c3e50;
        margin-bottom: 30px;
        font-size: 28px;
    }

    .discipline-list {
        display: flex;
        flex-direction: column;
        gap: 20px;
    }

    .discipline-card {
        background-color: #ffffff;
        padding: 20px;
        border-left: 5px solid #3498db;
        border-radius: 8px;
        transition: box-shadow 0.2s;
    }

    .discipline-card:hover {
        box-shadow: 0 4px 12px rgba(0,0,0,0.08);
    }

    .discipline-card h3 {
        margin: 0 0 10px;
        color: #34495e;
        font-size: 22px;
    }

    .teacher-list {
        padding-left: 20px;
        margin: 10px 0 0;
    }

    .teacher-list li {
        margin-bottom: 5px;
        color: #2c3e50;
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
