<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
protected $casts = [
    'hire_date' => 'date',
];

    protected $fillable = [
        'first_name', 'last_name', 'gender', 'email', 'phone',
        'department_id', 'position_id', 'salary', 'hire_date', 'status'
    ];

    // 🔗 علاقات

    // كل موظف ينتمي إلى قسم واحد
    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    // كل موظف يشغل منصب واحد
    public function position()
    {
        return $this->belongsTo(Position::class);
    }

    // الموظف يمكن أن يكون له حساب مستخدم
    public function user()
    {
        return $this->hasOne(User::class);
    }

    // الموظف يمكن أن يكون لديه مهام متعددة
    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    // التقارير الخاصة بالموظف
    public function reports()
    {
        return $this->hasMany(Report::class);
    }
}
