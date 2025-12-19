<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Member extends Authenticatable
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'password', 'employee_id'];
    protected $hidden = ['password'];

    // العضو ينتمي لموظف
    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    // العلاقة polymorphic مع الأدوار
   public function roles()
{
    return $this->morphToMany(Role::class, 'authorizable', 'role_member', 'authorizable_id', 'role_id');
}


    // العضو يمكنه إنشاء عدة تقارير
    public function reports()
    {
        return $this->hasMany(Report::class, 'created_by');
    }
}
