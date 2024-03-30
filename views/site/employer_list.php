<div style="display: flex; flex-direction: column; align-items: center">
    <h2>Список всех сотрудников</h2>
    <ul>
        <?php foreach ($employers as $employer): ?>
            <div style="display: flex; justify-content: space-around; width: 1500px">
                <li><?= e($employer->name) ?></li>
                <button style="width: 360px; height: 40px; background-color: #224d8c;
                border: none; border-radius: 10px; margin-bottom: 20px; color: #b1caee;
                font-size: 16px;">Прикрепить к дисциплине</button>
            </div>
        <?php endforeach; ?>
    </ul>
</div>
<style>
    li{
        list-style-type: none;
    }
</style>