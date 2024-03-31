<div style="display: flex; flex-direction: column; align-items: center">
    <h2>Регистрация деканата</h2>
    <h3><?= $message ?? ''; ?></h3>
    <form method="post" style="display: flex; flex-direction: column; align-items: center; justify-content: center; width: 1120px; height: 500px; background-color: #ceddf5">
        <label><input type="text" name="name" class="signup_input" placeholder="Имя"></label>
        <label><input type="text" name="login" class="signup_input" placeholder="Логин"></label>
        <label><input type="password" name="password" class="signup_input" placeholder="Пароль"></label>
        <button style="width: 540px; height: 60px; background-color: #224d8c; border: none;
        border-radius: 10px; color: #b1caee; font-size: 16px;">Зарегистрироваться</button>
    </form>
</div>
<style>
    .signup_input{
        width: 900px;
        height: 60px;
        border: none;
        border-radius: 10px;
        margin-bottom: 50px;
    }
</style>