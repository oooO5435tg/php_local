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
                'name' => ['required'],
                'login' => ['required', 'unique:users,login'],
                'password' => ['required']
            ], [
                'required' => 'Поле :field пусто',
                'unique' => 'Поле :field должно быть уникально'
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

    public function employerList(): string
    {
        $employers = Employer::all();
        $disciplines = Discipline::all();
        return new View('site.employer_list', ['employers' => $employers]);
    }

    public function addDepartment(Request $request): string
    {
        $title_department = Department::all();
        if ($request->method === 'POST'&& Department::create($request->all())){
            app()->route->redirect('/add_department');
        }
        return new View('site.add_department', ['title_department' => $title_department]);
    }
    public function addPosition(Request $request): string
    {
        $title_position = Position::all();
        if ($request->method === 'POST'&& Position::create($request->all())){
            app()->route->redirect('/add_position');
        }
        return new View('site.add_position', ['title_position' => $title_position]);
    }

    public function addDiscipline(Request $request): string
    {
        $title_discipline = Discipline::all();
        if ($request->method === 'POST'&& Discipline::create($request->all())){
            app()->route->redirect('/add_discipline');
        }
        return new View('site.add_discipline', ['title_discipline' => $title_discipline]);
    }

    public function addDeanery(): string
    {
        return new View('site.add_deanery');
    }
//    public function addEmployer(Request $request): string
//    {
//        $employers = Employer::all();
//        $departments = Department::all();
//        $positions = Position::all();
//        $disciplines = Discipline::all();
//        $list_disciplines = ListDiscipline::all();
//        if ($request->method === 'POST'&& Employer::create($request->all())){
//            app()->route->redirect('/add_employer');
//        }
//        return new View('site.add_employer', ['employers' => $employers, 'departments' => $departments,
//            'positions' => $positions, 'list_disciplines' => $list_disciplines, 'disciplines' => $disciplines]);
//    }

    public function addEmployer(Request $request): string
    {
        $employers = Employer::all();
        $departments = Department::all();
        $positions = Position::all();
        $disciplines = Discipline::all();

        if ($request->method === 'POST') {
            $data = $request->all();

            $disciplineIds = $data['disciplines'];
            $numberHours = $data['number_hours'];

            $disciplineIdList = '';
            $numberHoursList = '';

            foreach ($disciplineIds as $index => $disciplineId) {
                $disciplineIdList .= $disciplineId . ',';
                $numberHoursList .= $numberHours[$index] . ',';
            }

            $disciplineIdList = rtrim($disciplineIdList, ',');
            $numberHoursList = rtrim($numberHoursList, ',');

            $employerData = [
                'surname' => $data['surname'],
                'name' => $data['name'],
                'patronymic' => $data['patronymic'],
                'gender' => $data['gender'],
                'birthday' => $data['birthday'],
                'adress' => $data['adress'],
                'id_department' => $data['id_department'],
                'id_position' => $data['id_position'],
                'id_discipline' => $disciplineIdList,
                'number_hours' => $numberHoursList,
                'image' => $data['image']
            ];

            if (Employer::create($employerData)) {
                app()->route->redirect('/add_employer');
            }
        }

        return new View('site.add_employer', ['employers' => $employers, 'departments' => $departments,
            'positions' => $positions, 'disciplines' => $disciplines]);
    }

//    public function searching(Request $request): string
//    {
//
//        $employers = Employer::all();
//
//        if($request->method === 'POST'){
//            $temp = $request->all();
//            $employerID = $temp['employer'];
//            $employers = Employer::where('surname', 'LIKE', "%$employerID%")->get();
//        }
//
//        return new View('site.searching', ['employers' => $employers]);
//    }

    public function search_employer(Request $request): string
    {
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