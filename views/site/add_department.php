<div style="display: flex; flex-direction: column; align-items: center">
    <h2>Добавление кафедры</h2>
    <form method="POST" action="<?= app()->route->getUrl('/add_department') ?>">
        <input type="text" name="name" id="name" required placeholder="Название" style="width: 900px; height: 60px; background-color: #F1F1F1; border: none; border-radius: 10px">
        <button type="submit" style="width: 540px; height: 60px; background-color: #224d8c;
        border: none; border-radius: 10px; margin-top: 50px;
        color: #b1caee; font-size: 16px;">Добавить</button>
    </form>
</div>

<style>
    form{
        width: 1120px;
        height: 400px;
        background-color: #CEDDF5FF;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
    }
</style>