<div>
    <h1>Поиск</h1>
    <form method="post">
        <input name="csrf_token" type="hidden" value="<?= app()->auth::generateCSRF() ?>"/>
        <label>Найти сотрудника <input type="text" name="employer"></label>
        <button>Найти</button>
    </form>
    <div>
        <h2>Результат:</h2>
        <ul>
            <?php if (empty($filteredEmployers)): ?>
                <li><p>Ничего не найдено.</p></li>
            <?php else: ?>
                <?php foreach ($filteredEmployers as $employer): ?>
                    <li>
                        <p>Фамилия: <?= $employer->surname?></p>
                        <p>Имя: <?= $employer->name?></p>
                        <p>Отчестсво: <?= $employer->patronymic?></p>
                        <p>Пол: <?= $employer->gender?></p>
                        <p>Дата рождения: <?= $employer->birthday?></p>
                        <p>Адрес: <?= $employer->adress?></p>
                        <p>Должность: <?= $employer->id_position?></p>
                        <p>Кафедра: <?= $employer->id_department?></p>
                        <p>Дисциплины: <?= $employer->id_discipline?></p>
                    </li>
                <?php endforeach; ?>
            <?php endif; ?>
        </ul>
    </div>
</div>