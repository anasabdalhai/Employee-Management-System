<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description'];

    // الدور يمكن أن يرتبط بعدة مستخدمين
    public function users()
    {
        return $this->belongsToMany(User::class, 'role_user');
    }
}
