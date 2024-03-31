<div style="display: flex; flex-direction: column; align-items: center">
    <h2>Добавление дисциплины</h2>
    <h3><?= $message ?? ''; ?></h3>
    <form method="POST">
        <input name="csrf_token" type="hidden" value="<?= app()->auth::generateCSRF() ?>"/>
        <input type="text" name="title_discipline" placeholder="Название" style="width: 900px; height: 60px; background-color: #F1F1F1; border: none; border-radius: 10px">
        <button type="submit" style="width: 540px; height: 60px; background-color: #224d8c;
        border: none; border-radius: 10px; margin-top: 50px; color: #b1caee;
        font-size: 16px;">Добавить</button>
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