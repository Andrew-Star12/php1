<section class="department-list">
    <h2>Список кафедр</h2>

    <?php if (!empty($departments)): ?>
        <table border="1">
            <thead>
            <tr>
                <th>Название кафедры</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($departments as $department): ?>
                <tr>
                    <td><?= $department->DepartmentName ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>Кафедры не найдены.</p>
    <?php endif; ?>
</section>


<style>
    .department-list {
        background-color: #fff;
        padding: 20px;
        margin: 20px auto;
        border-radius: 8px;
        max-width: 800px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .department-list h2 {
        text-align: center;
    }

    .department-list table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    .department-list th, .department-list td {
        padding: 12px;
        text-align: left;
        border: 1px solid #ccc;
    }

    .department-list th {
        background-color: #f4f4f4;
    }

    .department-list td {
        background-color: #f9f9f9;
    }

</style>