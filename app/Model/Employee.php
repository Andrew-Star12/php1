<?php

namespace Model;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    // Указываем, что модель работает с таблицей 'employees'
    protected $table = 'employees';

    // Устанавливаем основной ключ для таблицы
    protected $primaryKey = 'id';

    // Указываем, что не будем использовать временные метки (created_at, updated_at)
    public $timestamps = false;

    // Указываем поля, которые могут быть массово заполняемыми
    protected $fillable = [
        'FirstName',
        'LastName',
        'Patronymic',
        'Gender',
        'Address',
        'Position',
        'DateOfBirth'
    ];

    // Связь многие ко многим с таблицей кафедр
    public function departments()
    {
        return $this->belongsToMany(Department::class, 'employee_department', 'employee_id', 'department_id');
    }

    public function disciplines()
    {
        return $this->belongsToMany(Discipline::class, 'discipline_employee', 'employee_id', 'discipline_id');
    }

}
