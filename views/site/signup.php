<div style="display: flex; flex-direction: column; align-items: center">
    <h2>Регистрация нового пользователя</h2>
    <h3><?= $message ?? ''; ?></h3>
    <form method="post" style="display: flex; flex-direction: column; align-items: center; justify-content: center; width: 1120px; height: 500px; background-color: #D9D9D9">
        <label><input type="text" name="name" class="signup_input" placeholder="Имя"></label>
        <label><input type="text" name="login" class="signup_input" placeholder="Логин"></label>
        <label><input type="password" name="password" class="signup_input" placeholder="Пароль"></label>
        <button style="width: 540px; height: 60px; background-color: #C6C6C6; border: none; border-radius: 10px">Зарегистрироваться</button>
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