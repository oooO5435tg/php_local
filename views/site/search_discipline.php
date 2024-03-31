<div>
    <h1>Поиск</h1>
    <form method="post">
        <input name="csrf_token" type="hidden" value="<?= app()->auth::generateCSRF() ?>"/>
        <label>Найти дисциплину <input type="text" name="discipline"></label>
        <button>Найти</button>
    </form>
    <div>
        <h2>Результат:</h2>
        <ul>
            <?php if (empty($filteredDiscipline)): ?>
                <li><p>Ничего не найдено.</p></li>
            <?php else: ?>
                <?php foreach ($filteredDiscipline as $discipline): ?>
                    <li>
                        <p>Название: <?= $discipline->title_discipline?></p>
                    </li>
                <?php endforeach; ?>
            <?php endif; ?>
        </ul>
    </div>
</div>