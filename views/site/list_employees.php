<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Список сотрудников</title>
</head>
<body>

<h2>Список сотрудников</h2>

<?php if (!empty($employees)): ?>
    <table border="1">
        <thead>
        <tr>
            <th>Имя</th>
            <th>Фамилия</th>
            <th>Отчество</th>
            <th>Пол</th>
            <th>Дата рождения</th>
            <th>Адрес</th>
            <th>Должность</th>
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
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
<?php else: ?>
    <p>Сотрудники не найдены.</p>
<?php endif; ?>

</body>
</html>
