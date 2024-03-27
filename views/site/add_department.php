<div style="display: flex; flex-direction: column; align-items: center">
    <h2>Добавление кафедры</h2>
    <form method="POST" action="<?= app()->route->getUrl('/add_department') ?>">
        <input type="text" name="name" id="name" required placeholder="Название" style="width: 900px; height: 60px; background-color: #F1F1F1; border: none; border-radius: 10px">
        <button type="submit" style="width: 540px; height: 60px; background-color: #C6C6C6; border: none; border-radius: 10px; margin-top: 50px">Добавить кафедру</button>
    </form>
</div>

<style>
    form{
        width: 1120px;
        height: 400px;
        background-color: #D9D9D9;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
    }
</style>