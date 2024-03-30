<div style="display: flex; flex-direction: column; align-items: center">
    <h2>Вход в систему</h2>
    <h3><?= $message ?? ''; ?></h3>

    <h3><?= app()->auth->user()->name ?? ''; ?></h3>
    <?php
    if (!app()->auth::check()):
    ?>
    <form method="post" style="display: flex; flex-direction: column; align-items: center; justify-content: center; width: 1120px; height: 500px; background-color: #ceddf5">
        <input name="csrf_token" type="hidden" value="<?= app()->auth::generateCSRF() ?>"/>
        <label><input type="text" name="login" placeholder="Логин" class="login_input"></label>
        <label><input type="password" name="password" placeholder="Пароль" class="login_input"></label>
        <button style="width: 540px; height: 60px; background-color: #224d8c; border: none;
        border-radius: 10px; color: #b1caee; font-size: 16px;">Авторизоваться</button>
    </form>
</div>
<style>
    .login_input{
        width: 900px;
        height: 60px;
        border: none;
        border-radius: 10px;
        margin-bottom: 50px;
    }
</style>
<?php endif;