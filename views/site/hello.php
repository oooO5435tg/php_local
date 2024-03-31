<div style="display: flex; flex-direction: column; align-items: center">
    <h2>Главная</h2>
    <div style="display: flex">
        <div style="background-color: #ceddf5; width: 500px; height: 500px; display: flex; flex-direction: column; align-items: center; margin-right: 50px">
            <h3>Посмотреть сотрудника(ов)</h3>
            <div style="display: flex; flex-direction: column">
                <button class="hello-btn"><a href="<?= app()->route->getUrl('/search_employer') ?>">Смотреть</a></button>
            </div>
        </div>
        <div style="background-color: #ceddf5; width: 500px; height: 500px; display: flex; flex-direction: column; align-items: center; margin-right: 50px">
            <h3>Посмотреть кафедру(ы)</h3>
            <div style="display: flex; flex-direction: column">
                <button class="hello-btn"><a href="<?= app()->route->getUrl('/search_department') ?>">Смотреть</a></button>
            </div>
        </div>
        <div style="background-color: #ceddf5; width: 500px; height: 500px; display: flex; flex-direction: column; align-items: center; margin-right: 50px">
            <h3>Посмотреть дисциплину(ы)</h3>
            <div style="display: flex; flex-direction: column">
                <button class="hello-btn"><a href="<?= app()->route->getUrl('/search_discipline') ?>">Смотреть</a></button>
            </div>
        </div>
    </div>
</div>

<style>
    form{
        width: 1120px;
        height: 400px;
        background-color: #ceddf5;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
    }
    .hello-btn{
        background-color: #224d8c;
        width: 220px;
        height: 40px;
        border: none;
        border-radius: 10px;
        margin-top: 20px;
    }
    .hello-btn a{
        color: #b1caee;
        font-size: 16px;
        text-decoration: none;
    }
</style>