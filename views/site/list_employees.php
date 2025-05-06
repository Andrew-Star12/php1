<section class="list-employees">
    <h2>Список сотрудников</h2>

    <?php if (!empty($employees)): ?>
        <table>
            <thead>
            <tr>
                <th>Фамилия</th>
                <th>Имя</th>
                <th>Отчество</th>
                <th>Пол</th>
                <th>Дата рождения</th>
                <th>Адрес</th>
                <th>Должность</th>
                <th>Кафедры</th>
                <th>Дисциплины</th>
                <th>Действия</th> <!-- Новый столбец -->
            </tr>
            </thead>
            <tbody>
            <?php foreach ($employees as $employee): ?>
                <tr>
                    <td><?= $employee->LastName ?></td>
                    <td><?= $employee->FirstName ?></td>
                    <td><?= $employee->Patronymic ?></td>
                    <td><?= $employee->Gender ?></td>
                    <td><?= $employee->DateOfBirth ?></td>
                    <td><?= $employee->Address ?></td>
                    <td><?= $employee->Position ?></td>
                    <td>
                        <?php foreach ($employee->departments as $dept): ?>
                            <?= $dept->DepartmentName ?><br>
                        <?php endforeach; ?>
                    </td>
                    <td>
                        <?php foreach ($employee->disciplines as $discipline): ?>
                            <?= $discipline->DisciplineName ?><br>
                        <?php endforeach; ?>
                    </td>
                    <td>
                        <a class="edit-button" href="<?= app()->route->getUrl('/employee/edit/' . $employee->id) ?>">Редактировать</a>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>Сотрудники не найдены.</p>
    <?php endif; ?>
</section>


<style>
    /* Общие стили для секции */
    .list-employees {
        width: 90%;
        background-color: #e6f2ff;
        margin: auto;
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    h2 {
        text-align: center;
        font-size: 24px;
        font-weight: bold;
        color: #2c3e50;
        margin-bottom: 20px;
    }

    /* Стили для таблицы */
    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
        border-radius: 8px;
    }

    th, td {
        padding: 12px 15px;
        text-align: left;
        font-size: 16px;
        color: #34495e;
        border: 1px solid #bdc3c7; /* Обводка для ячеек */
    }

    th {
        background-color: #2980b9;
        color: white;
        font-weight: bold;
        border-top-left-radius: 8px;
        border-top-right-radius: 8px;
    }

    /* Чередование цветов строк таблицы */
    tr:nth-child(even) {
        background-color: #ecf0f1;
    }

    tr:nth-child(odd) {
        background-color: #ffffff;
    }

    tr:hover {
        background-color: #d5dbdb;
        cursor: pointer;
    }

    p {
        text-align: center;
        color: #e74c3c;
        font-size: 18px;
        font-weight: bold;
    }

    .edit-button {
        background-color: #207d6c;
        color: white;
        padding: 6px 12px;
        border-radius: 5px;
        text-decoration: none;
        font-weight: bold;
        transition: background-color 0.3s;
    }

    .edit-button:hover {
        background-color: #1e8449;
    }

</style>
