<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'type', 'created_by', 'employee_id', 'department_id',
        'report_period_start', 'report_period_end', 'content'
    ];
     protected $casts = [
        'report_period_start' => 'datetime',
        'report_period_end'   => 'datetime',
    ];

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
    // التقرير أنشأه مستخدم
    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    // التقرير خاص بموظف معين (اختياري)
    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    // التقرير خاص بقسم معين (اختياري)
    public function department()
    {
        return $this->belongsTo(Department::class);
    }
}
