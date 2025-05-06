<?php

namespace Controller;

use Model\Post;
use Src\View;
use Src\Request;
use Model\User;
use Src\Auth\Auth;
use Model\Employee;
use Model\Department;
use Model\Discipline;
class   Site
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
        $departments = Department::all();   // получаем кафедры
        $disciplines = Discipline::all();   // получаем дисциплины

        return new View('site.create_employee', [
            'departments' => $departments,
            'disciplines' => $disciplines
        ]);
    }


    public function storeEmployee(Request $request): void
    {
        if ($request->method === 'POST') {
            $data = $request->all();

            if (empty($data['FirstName']) || empty($data['LastName'])) {
                $message = 'Имя и фамилия обязательны!';
                echo new View('site.create_employee', ['message' => $message]);
                return;
            }

            // Создание сотрудника
            $employee = new Employee();
            $employee->FirstName = $data['FirstName'];
            $employee->LastName = $data['LastName'];
            $employee->Patronymic = $data['Patronymic'] ?? '';
            $employee->Gender = $data['Gender'];
            $employee->DateOfBirth = $data['DateOfBirth'];
            $employee->Address = $data['Address'] ?? '';
            $employee->Position = $data['Position'] ?? '';

            // Сохраняем сотрудника
            if ($employee->save()) {
                // Привязка к кафедрам
                if (!empty($data['departments'])) {
                    $employee->departments()->sync($data['departments']);
                }

                //  Привязка к дисциплинам
                if (!empty($data['disciplines'])) {
                    $employee->disciplines()->sync($data['disciplines']);
                }

                // Редирект
                app()->route->redirect('/employees');
            } else {
                $message = 'Ошибка при добавлении сотрудника!';
                echo new View('site.create_employee', ['message' => $message]);
            }
        }
    }


    public function listEmployees(Request $request): string
    {
        // Жадная загрузка связей
        $employees = Employee::with('departments')->orderBy('LastName')->get();

        return new View('site.list_employees', ['employees' => $employees]);
    }


    public function createDepartment(Request $request): string
    {
        $employees = Employee::orderBy('LastName')->get();
        return new View('site.create_department', ['employees' => $employees]);
    }

    public function storeDepartment(Request $request): void
    {
        if ($request->method === 'POST') {
            $data = $request->all();

            if (empty($data['DepartmentName'])) {
                echo new View('site.create_department', ['message' => 'Название кафедры обязательно!']);
                return;
            }

            $department = new Department();
            $department->DepartmentName = $data['DepartmentName'];

            if ($department->save()) {
                // Привязка сотрудников
                if (!empty($data['employees'])) {
                    $department->employees()->sync($data['employees']);
                }

                app()->route->redirect('/departments');
            } else {
                echo new View('site.create_department', ['message' => 'Ошибка при добавлении кафедры!']);
            }
        }
    }


    public function listDepartments(Request $request): string
    {
        // Получаем все кафедры из базы данных
        $departments = Department::all();

        // Передаем данные в представление для отображения
        return new View('site.list_departments', ['departments' => $departments]);
    }

    public function createDiscipline(Request $request): string
    {
        $employees = Employee::all(); // получаем всех сотрудников
        return new View('site.create_discipline', ['employees' => $employees]);
    }

    public function storeDiscipline(Request $request): void
    {
        if ($request->method === 'POST') {
            $data = $request->all();

            if (empty($data['DisciplineName'])) {
                echo new View('site.create_discipline', [
                    'message' => 'Название дисциплины обязательно!',
                    'employees' => Employee::all()
                ]);
                return;
            }

            $discipline = new Discipline();
            $discipline->DisciplineName = $data['DisciplineName'];

            if ($discipline->save()) {
                if (!empty($data['employees'])) {
                    $discipline->employees()->sync($data['employees']);
                }

                app()->route->redirect('/disciplines');
            } else {
                echo new View('site.create_discipline', [
                    'message' => 'Ошибка при добавлении дисциплины!',
                    'employees' => Employee::all()
                ]);
            }
        }
    }

    public function listDisciplines(Request $request): string
    {
        // Получаем все дисциплины вместе с их сотрудниками
        $disciplines = Discipline::all();

        return new View('site.list_disciplines', ['disciplines' => $disciplines]);
    }

    public function editEmployee( int $id, Request $request): string
    {
        $employee = Employee::with(['departments', 'disciplines'])->find($id);

        if (!$employee) {
            return new View('site.list_employees', ['message' => 'Сотрудник не найден']);
        }

        $departments = Department::all();
        $disciplines = Discipline::all();

        return new View('site.edit_employee', [
            'employee' => $employee,
            'departments' => $departments,
            'disciplines' => $disciplines
        ]);
    }

    public function updateEmployee(int $id, Request $request): void
    {
        if ($request->method === 'POST') {
            $employee = Employee::find($id);
            if (!$employee) {
                echo new View('site.list_employees', ['message' => 'Сотрудник не найден']);
                return;
            }

            $data = $request->all();

            $employee->FirstName = $data['FirstName'];
            $employee->LastName = $data['LastName'];
            $employee->Patronymic = $data['Patronymic'] ?? '';
            $employee->Gender = $data['Gender'];
            $employee->DateOfBirth = $data['DateOfBirth'];
            $employee->Address = $data['Address'] ?? '';
            $employee->Position = $data['Position'] ?? '';

            if ($employee->save()) {
                // Обновляем связи
                $employee->departments()->sync($data['departments'] ?? []);
                $employee->disciplines()->sync($data['disciplines'] ?? []);

                app()->route->redirect('/employees');
            } else {
                echo new View('site.edit_employee', [
                    'employee' => $employee,
                    'message' => 'Ошибка при сохранении!'
                ]);
            }
        }
    }
    public function editDiscipline(int $id, Request $request): string
    {
        $discipline = Discipline::with('employees')->find($id);
        if (!$discipline) {
            return new View('site.list_disciplines', ['message' => 'Дисциплина не найдена']);
        }

        $employees = Employee::all();
        return new View('site.edit_discipline', [
            'discipline' => $discipline,
            'employees' => $employees
        ]);
    }

    public function updateDiscipline(int $id, Request $request): void
    {
        if ($request->method === 'POST') {
            $discipline = Discipline::find($id);
            if (!$discipline) {
                echo new View('site.list_disciplines', ['message' => 'Дисциплина не найдена']);
                return;
            }

            $data = $request->all();

            $discipline->DisciplineName = $data['DisciplineName'];
            if ($discipline->save()) {
                $discipline->employees()->sync($data['employees'] ?? []);
                app()->route->redirect('/disciplines');
            } else {
                echo new View('site.edit_discipline', [
                    'discipline' => $discipline,
                    'employees' => Employee::all(),
                    'message' => 'Ошибка при сохранении дисциплины!'
                ]);
            }
        }
    }

    public function editDepartment(int $id, Request $request): string
    {
        $department = Department::with('employees')->find($id);

        if (!$department) {
            return new View('site.list_departments', ['message' => 'Кафедра не найдена']);
        }

        $employees = Employee::orderBy('LastName')->get(); // отсортируем по фамилии

        return new View('site.edit_department', [
            'department' => $department,
            'employees' => $employees
        ]);
    }

    public function updateDepartment(int $id, Request $request): void
    {
        if ($request->method === 'POST') {
            $department = Department::find($id);
            if (!$department) {
                echo new View('site.list_departments', ['message' => 'Кафедра не найдена']);
                return;
            }

            $data = $request->all();
            $department->DepartmentName = $data['DepartmentName'];

            if ($department->save()) {
                $department->employees()->sync($data['employees'] ?? []);
                app()->route->redirect('/departments');
            } else {
                echo new View('site.edit_department', [
                    'department' => $department,
                    'employees' => Employee::all(),
                    'message' => 'Ошибка при сохранении кафедры!'
                ]);
            }
        }
    }


}