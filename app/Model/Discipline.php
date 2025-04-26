<?php

namespace Model;

use Illuminate\Database\Eloquent\Model;

class Discipline extends Model
{
    protected $table = 'disciplines'; // имя таблицы
    protected $primaryKey = 'id';     // первичный ключ
    public $timestamps = false;       // если нет created_at и updated_at

    protected $fillable = ['DisciplineName']; // поля, разрешённые к массовому заполнению

    // МНОГИЕ-КО-МНОГИМ: дисциплину могут вести много сотрудников
    public function employees()
    {
        return $this->belongsToMany(Employee::class, 'discipline_employee', 'discipline_id', 'employee_id');
    }
}
