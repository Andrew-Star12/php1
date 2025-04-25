<section class="list-employees">
    <h2>Список сотрудников</h2>

    <?php if (!empty($employees)): ?>
        <table>
            <thead>
            <tr>
                <th>Имя</th>
                <th>Фамилия</th>
                <th>Отчество</th>
                <th>Пол</th>
                <th>Дата рождения</th>
                <th>Адрес</th>
                <th>Должность</th>
                <th>Кафедры</th> <!-- добавлено -->
            </tr>
            </thead>
            <tbody>
            <?php foreach ($employees as $employee): ?>
                <tr>
                    <td><?= $employee->FirstName ?></td>
                    <td><?= $employee->LastName ?></td>
                    <td><?= $employee->Patronymic ?></td>
                    <td><?= $employee->Gender ?></td>
                    <td><?= $employee->DateOfBirth ?></td>
                    <td><?= $employee->Address ?></td>
                    <td><?= $employee->Position ?></td>
                    <td>
                        <?php if (!empty($employee->departments)): ?>
                            <?php foreach ($employee->departments as $dept): ?>
                                <?= $dept->DepartmentName ?><br>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <em>Нет кафедр</em>
                        <?php endif; ?>
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

    /* Добавление стилей для пустого состояния */
    p {
        text-align: center;
        color: #e74c3c;
        font-size: 18px;
        font-weight: bold;
    }
</style>
