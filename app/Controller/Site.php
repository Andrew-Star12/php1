<?php

namespace Controller;

use Model\Post;
use Src\View;
use Src\Request;
use Model\User;
use Src\Auth\Auth;
use Model\Employee;
class Site
{
    public function index(Request $request): string
    {
        $posts = Post::where('id', $request->id)->get();
        return (new View())->render('site.post', ['posts' => $posts]);
    }

    public function hello(): string
    {
        return new View('site.hello', ['message' => 'hello working']);
    }

    public function signup(Request $request): string
    {
        if ($request->method === 'POST' && User::create($request->all())) {
            app()->route->redirect('/login');
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

    public function createEmployee(Request $request): string
    {
        // Если есть сообщение в запросе (например, после успешного добавления сотрудника)
        $message = $request->get('message', '');

        // Передаем сообщение в представление
        return new View('site.create_employee', ['message' => $message]);
    }

    public function storeEmployee(Request $request): void
    {
        if ($request->method === 'POST') {
            // Получаем данные из формы
            $data = $request->all();  // Получаем все данные

            // Валидируем данные
            if (empty($data['FirstName']) || empty($data['LastName'])) {
                // Формируем сообщение об ошибке, если имя или фамилия не заполнены
                $message = 'Имя и фамилия обязательны!';
                // Отображаем форму с сообщением об ошибке
                echo new View('site.create_employee', ['message' => $message]);
                return;
            }

            // Создаем нового сотрудника
            $employee = new Employee();
            $employee->FirstName = $data['FirstName'];
            $employee->LastName = $data['LastName'];
            $employee->Patronymic = $data['Patronymic'] ?? '';  // Если отчество не заполнено, оставляем пустым
            $employee->Gender = $data['Gender'];
            $employee->DateOfBirth = $data['DateOfBirth'];
            $employee->Address = $data['Address'] ?? '';  // Если адрес не заполнен, оставляем пустым
            $employee->Position = $data['Position'] ?? '';  // Если должность не заполнена, оставляем пустым

            // Сохраняем в базе данных
            if ($employee->save()) {
                // Редирект на страницу списка сотрудников
                app()->route->redirect('/hello');
            } else {
                // Если ошибка при добавлении, выводим сообщение
                $message = 'Ошибка при добавлении сотрудника!';
                echo new View('site.create_employee', ['message' => $message]);
            }
        }
    }

    public function listEmployees(Request $request): string
    {
        // Получаем всех сотрудников
        $employees = Employee::all();

        // Отображаем представление с сотрудниками
        return new View('site.list_employees', ['employees' => $employees]);
    }


}