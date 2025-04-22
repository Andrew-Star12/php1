<section class="create-employee">
    <h2>Добавить сотрудника</h2>
    <h3><?= $message ?? ''; ?></h3>

    <form method="POST" >
        <label>Имя <input type="text" name="FirstName"></label>
        <label>Фамилия <input type="text" name="LastName"></label>
        <label>Отчество <input type="text" name="Patronymic"></label>
        <label>Пол <input type="text" name="Gender"></label>
        <label>Дата рождения <input type="date" name="DateOfBirth"></label>
        <label>Адрес <input type="text" name="Address"></label>
        <label>Должность <input type="text" name="Position"></label>
        <button class="create-button" type="submit">Создать сотрудника</button>
    </form>
</section>
