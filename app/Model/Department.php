<?php

namespace Model;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $table = 'departments'; // Таблица
    protected $primaryKey = 'id';     // Первичный ключ
    public $timestamps = false;       // Отключаем created_at/updated_at

    protected $fillable = ['DepartmentName']; // Разрешенные к массовому заполнению

    public function employees()
    {
        return $this->belongsToMany(Employee::class, 'employee_department', 'department_id', 'employee_id');
    }

}
