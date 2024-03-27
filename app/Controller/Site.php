<?php

namespace Controller;

use Model\Post;
use Model\User;
use Src\Request;
use Src\View;
use Src\Auth\Auth;

class Site
{
    public function index(Request $request): string
    {
        $posts = Post::where('id', $request->id)->get();
        return (new View())->render('site.post', ['posts' => $posts]);
    }

    public function signup(Request $request): string
    {
        if ($request->method === 'POST' && User::create($request->all())) {
            app()->route->redirect('/go');
        }
        return new View('site.signup');
    }

    public function login(Request $request): string
    {
        //Если просто обращение к странице, то отобразить форму
        if ($request->method === 'GET') {
            return new View('site.login');
        }
        //Если удалось аутентифицировать пользователя, то редирект
        if (Auth::attempt($request->all())) {
            app()->route->redirect('/hello');
        }
        //Если аутентификация не удалась, то сообщение об ошибке
        return new View('site.login', ['message' => 'Неправильные логин или пароль']);
    }

    public function logout(): void
    {
        Auth::logout();
        app()->route->redirect('/hello');
    }

    public function hello(): string
    {
        return new View('site.hello', ['message' => 'hello working']);
    }

    public function employerList(): string
    {
        $employers = User::all();
        return new View('site.employer_list', ['employers' => $employers]);
    }

    public function addDepartment(): string
    {
        return new View('site.add_department');
    }
    public function addPosition(): string
    {
        return new View('site.add_position');
    }
    public function addDiscipline(): string
    {
        return new View('site.add_discipline');
    }
}