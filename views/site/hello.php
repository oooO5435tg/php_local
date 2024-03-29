<div style="display: flex; flex-direction: column; align-items: center">
    <h2>Главная</h2>
    <div style="display: flex">
        <div style="background-color: #ceddf5; width: 500px; height: 500px; display: flex; flex-direction: column; align-items: center; margin-right: 50px">
            <h3>Дисциплины,читаемые сотрудником(ами)</h3>
            <div style="display: flex; flex-direction: column">
                <?php
                $users = \Model\User::all();
                foreach ($users as $user) {
                    echo "<div style='display: flex; align-items: center; margin-bottom: 10px;'>
                            <input type='checkbox'>
                            <label>" . e($user->name) . "</label>
                          </div>";
                }
                ?>
            </div>
            <div style="display: flex; flex-direction: column">
                <a>Еще</a>
                <button class="hello-btn">Смотреть</button>
            </div>
        </div>
        <div style="background-color: #ceddf5; width: 500px; height: 500px; display: flex; flex-direction: column; align-items: center; margin-right: 50px">
            <h3>Сотрудники по кафедре(ам)</h3>
            <div style="display: flex; flex-direction: column">
                <?php
                $departments = \Model\Department::all();
                foreach ($departments as $department) {
                    echo "<div style='display: flex; align-items: center; margin-bottom: 10px;'>
                            <input type='checkbox'>
                            <label>" . e($department->title_department) . "</label>
                          </div>";
                }
                ?>
            </div>
            <div style="display: flex; flex-direction: column">
                <a>Еще</a>
                <button class="hello-btn">Смотреть</button>
            </div>
        </div>
        <div style="background-color: #ceddf5; width: 500px; height: 500px; display: flex; flex-direction: column; align-items: center">
            <h3>Дисциплины, читаемые сотрудниками по кафедре(ам)</h3>
            <div style="display: flex; flex-direction: column">
                <?php
                $departments = \Model\Department::all();
                foreach ($departments as $department) {
                    echo "<div style='display: flex; align-items: center; margin-bottom: 10px;'>
                            <input type='checkbox'>
                            <label>" . e($department->title_department) . "</label>
                          </div>";
                }
                ?>
            </div>
            <div style="display: flex; flex-direction: column">
                <a>Еще</a>
                <button class="hello-btn">Смотреть</button>
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
        color: #b1caee;
        font-size: 16px;
    }
</style>