<div style="display: flex; flex-direction: column; align-items: center">
    <h2>Добавление сотрудников</h2>
    <h3><?= $message ?? ''; ?></h3>
    <form method="post" style="display: flex; flex-direction: column; align-items: center; justify-content: center; width: 920px; height: 1010px; background-color: #ceddf5">
        <input name="csrf_token" type="hidden" value="<?= app()->auth::generateCSRF() ?>"/>
        <label><input type="text" name="surname" class="signup_input" placeholder="Фамилия"></label>
        <label><input type="text" name="name" class="signup_input" placeholder="Имя"></label>
        <label><input type="text" name="patronymic" class="signup_input" placeholder="Отчество"></label>
        Пол:<>
        <label><input type="date" name="birthday" class="signup_input" placeholder="Дата рождение"></label>
        <label><input type="text" name="adress" class="signup_input" placeholder="Адрес прописки"></label>
        Должность:<><br>
        Кафедра:<><br>
        <button style="width: 540px; height: 60px; background-color: #224d8c; border: none;
        border-radius: 10px; color: #b1caee; font-size: 16px;">Создать</button>
    </form>
</div>
<style>
    .signup_input{
        width: 700px;
        height: 60px;
        border: none;
        border-radius: 10px;
        margin-bottom: 50px;
    }
</style>