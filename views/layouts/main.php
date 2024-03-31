<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Учебное управление</title>
</head>
<body>
<header>
    <nav style="background-color: #224d8c; height: 80px; display: flex; align-items: center; justify-content: space-around">

        <a href="<?= app()->route->getUrl('/hello') ?>">Главная</a>
        <!--        <a href="--><?php //= app()->route->getUrl('/employer_list') ?><!--">Список сотрудников</a>-->
        <?php
        if (!app()->auth::check()):
            ?>
            <a href="<?= app()->route->getUrl('/login') ?>">Вход</a>
            <a href="<?= app()->route->getUrl('/signup') ?>">Регистрация</a>
        <?php
        else:
            if (app()->auth::user()->id_role === 1) :
                ?>
                <a href="<?= app()->route->getUrl('/signup') ?>">Добавить деканата</a>
            <?php
            elseif (app()->auth::user()->id_role === 2) :
                ?>
                <a href="<?= app()->route->getUrl('/add_position') ?>">Добавить должность</a>
                <a href="<?= app()->route->getUrl('/add_department') ?>">Добавить кафедру</a>
                <a href="<?= app()->route->getUrl('/add_discipline') ?>">Добавить дисциплину</a>
                <a href="<?= app()->route->getUrl('/add_employer') ?>">Добавить сотрудников</a>
            <?php
            endif;
            ?>
            <a href="<?= app()->route->getUrl('/logout') ?>">Выход (<?= app()->auth::user()->name ?>)</a>
        <?php
        endif;
        ?>
    </nav>
</header>
<main>
    <?= $content ?? '' ?>
</main>

<style>
    body{
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        background-color: #85a4d3;
        font-size: 20px;
    }
    nav a{
        text-decoration: none;
        color: #b1caee;
        font-size: 18px;
    }
</style>
</body>
</html>