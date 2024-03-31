<?php

namespace Controller;

use Model\Department;
use Model\Discipline;
use Model\ListDiscipline;
use Model\Post;
use Model\User;
use Src\Request;
use Src\View;
use Src\Auth\Auth;

use Model\Position;

use Model\Employer;

use Src\Validator\Validator;

class Site
{
    public function index(Request $request): string
    {
        $posts = Post::where('id', $request->id)->get();
        return (new View())->render('site.post', ['posts' => $posts]);
    }

    public function signup(Request $request): string
    {
        if ($request->method === 'POST') {

            $validator = new Validator($request->all(), [
                'name' => ['required', 'no_special_chars'],
                'login' => ['required', 'unique:users,login', 'no_special_chars'],
                'password' => ['required', 'no_special_chars']
            ], [
                'required' => 'Поле :field пусто',
                'unique' => 'Поле :field должно быть уникально',
                'no_special_chars' => 'Поле :field не должно содержать спец символов'
            ]);

            if($validator->fails()){
                return new View('site.signup',
                    ['message' => json_encode($validator->errors(), JSON_UNESCAPED_UNICODE)]);
            }

            if (User::create($request->all())) {
                app()->route->redirect('/login');
            }
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

    public function addDepartment(Request $request): string
    {
        if ($request->method === 'POST') {
            $validator = new Validator($request->all(), [
                'title_department' => ['required', 'no_special_chars', 'no_digits'],
            ], [
                'required' => 'Поле :field пусто',
                'no_special_chars' => 'Поле :field не должно содержать спец символов',
                'no_digits' => 'Поле :field не должно содержать цифр'
            ]);

            if($validator->fails()){
                return new View('site.add_department',
                    ['message' => json_encode($validator->errors(), JSON_UNESCAPED_UNICODE)]);
            }

            if (Department::create($request->all())){
                app()->route->redirect('/add_department');
            }
        }
        return new View('site.add_department');
    }

    public function addPosition(Request $request): string
    {
        if ($request->method === 'POST') {
            $validator = new Validator($request->all(), [
                'title_position' => ['required', 'no_special_chars', 'no_digits'],
            ], [
                'required' => 'Поле :field пусто',
                'no_special_chars' => 'Поле :field не должно содержать спец символов',
                'no_digits' => 'Поле :field не должно содержать цифр'
            ]);

            if($validator->fails()){
                return new View('site.add_position',
                    ['message' => json_encode($validator->errors(), JSON_UNESCAPED_UNICODE)]);
            }

            if (Position::create($request->all())){
                app()->route->redirect('/add_position');
            }
        }
        return new View('site.add_position');
    }

    public function addDiscipline(Request $request): string
    {
        if ($request->method === 'POST') {
            $validator = new Validator($request->all(), [
                'title_discipline' => ['required', 'no_special_chars'],
            ], [
                'required' => 'Поле :field пусто',
                'no_special_chars' => 'Поле :field не должно содержать спец символов'
            ]);

            if($validator->fails()){
                return new View('site.add_discipline',
                    ['message' => json_encode($validator->errors(), JSON_UNESCAPED_UNICODE)]);
            }

            if (Discipline::create($request->all())){
                app()->route->redirect('/add_discipline');
            }
        }
        return new View('site.add_discipline');
    }

//    public function addEmployer(Request $request): string
//    {
//        $employers = Employer::all();
//        $departments = Department::all();
//        $positions = Position::all();
//        $disciplines = Discipline::all();
//        if ($request->method === 'POST'&& Employer::create($request->all())){
//            app()->route->redirect('/add_employer');
//        }
//        return new View('site.add_employer', ['employers' => $employers, 'departments' => $departments,
//            'positions' => $positions, 'disciplines' => $disciplines]);
//    }


    public function addEmployer(Request $request): string
    {
        $employers = Employer::all();
        $departments = Department::all();
        $positions = Position::all();
        $disciplines = Discipline::all();

        if ($request->method === 'POST') {
            $validator = new Validator($request->all(), [
                'surname' => ['required', 'no_special_chars', 'no_digits'],
                'name' => ['required', 'no_special_chars', 'no_digits'],
                'patronymic' => ['required', 'no_special_chars', 'no_digits'],
                'gender' => ['required'],
                'birthday' => ['required', 'birthday_valid'],
                'adress' => ['required', 'no_special_chars'],
                'id_position' => ['required'],
                'id_department' => ['required'],
                'id_discipline' => ['required'],
            ], [
                'required' => 'Поле :field пусто',
                'no_special_chars' => 'Поле :field не должно содержать спец символов',
                'no_digits' => 'Поле :field не должно содержать цифр',
                'birthday_valid' => 'Сотруднику должно быть не менее 18 лет'
            ]);

            if ($validator->fails()) {
                return new View('site.add_employer', [
                    'message' => json_encode($validator->errors(), JSON_UNESCAPED_UNICODE),
                    'employers' => $employers,
                    'departments' => $departments,
                    'positions' => $positions,
                    'disciplines' => $disciplines,
                ]);
            }

            if (Employer::create($request->all())) {
                app()->route->redirect('/add_employer');
            }
        }

        return new View('site.add_employer', ['employers' => $employers, 'departments' => $departments,
            'positions' => $positions, 'disciplines' => $disciplines]);
    }


    public function search_employer(Request $request): string
    {
        $images = Employer::all();
        $employers = Employer::all();

        if ($request->method === 'POST') {
            $temp = $request->all();
            $employerID = $temp['employer'];
            $filteredEmployers = Employer::whereRaw("LOWER(surname) LIKE ?", ["%{$employerID}%"])->get();

            return new View('site.search_employer', ['filteredEmployers' => $filteredEmployers]);
        }

        return new View('site.search_employer', ['employers' => $employers]);
    }
    public function search_department(Request $request): string
    {
        $departments = Department::all();

        if ($request->method === 'POST') {
            $temp = $request->all();
            $departmentID = $temp['department'];
            $filteredDepartment = Department::whereRaw("LOWER(title_department) LIKE ?", ["%{$departmentID}%"])->get();

            return new View('site.search_department', ['filteredDepartment' => $filteredDepartment]);
        }

        return new View('site.search_department', ['departments' => $departments]);
    }

    public function search_discipline(Request $request): string
    {
        $disciplines = Discipline::all();

        if ($request->method === 'POST') {
            $temp = $request->all();
            $disciplineID = $temp['discipline'];
            $filteredDiscipline = Discipline::whereRaw("LOWER(title_discipline) LIKE ?", ["%{$disciplineID}%"])->get();

            return new View('site.search_discipline', ['filteredDiscipline' => $filteredDiscipline]);
        }

        return new View('site.search_discipline', ['$disciplines' => $disciplines]);
    }
}