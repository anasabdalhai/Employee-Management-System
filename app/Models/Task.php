<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'description', 'employee_id', 'department_id', 'status'
    ];

    // المهمة مرتبطة بموظف
    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    // المهمة تنتمي إلى قسم
    public function department()
    {
        return $this->belongsTo(Department::class);
    }
}
