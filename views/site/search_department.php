<div>
    <h1>Поиск</h1>
    <form method="post">
        <input name="csrf_token" type="hidden" value="<?= app()->auth::generateCSRF() ?>"/>
        <label>Найти кафедру <input type="text" name="department"></label>
        <button>Найти</button>
    </form>
    <div>
        <h2>Результат:</h2>
        <ul>
            <?php if (empty($filteredDepartment)): ?>
                <li><p>Ничего не найдено.</p></li>
            <?php else: ?>
                <?php foreach ($filteredDepartment as $department): ?>
                    <li>
                        <p>Название: <?= $department->title_department?></p>
                    </li>
                <?php endforeach; ?>
            <?php endif; ?>
        </ul>
    </div>
</div>