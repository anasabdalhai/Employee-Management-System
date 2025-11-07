<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Member extends Authenticatable
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'password', 'employee_id'];

    protected $hidden = ['password'];

    // المستخدم ينتمي إلى موظف واحد
    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    // المستخدم لديه عدة أدوار (Many to Many)
    public function roles()
    {
        return $this->belongsToMany(Role::class, 'role_user');
    }

    // المستخدم يمكنه إنشاء عدة تقارير
    public function reports()
    {
        return $this->hasMany(Report::class, 'created_by');
    }
}
