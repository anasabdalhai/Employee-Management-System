<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'manager_id'];

    // القسم يحتوي على موظفين
    public function employees()
    {
        return $this->hasMany(Employee::class);
    }

    // القسم يحتوي على مهام
    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    // القسم قد يكون له تقارير
    public function reports()
    {
        return $this->hasMany(Report::class);
    }

    // المدير (موظف)
    public function manager()
    {
        return $this->belongsTo(Employee::class, 'manager_id');
    }
}
