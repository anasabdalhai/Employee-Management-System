<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoleAbility extends Model
{
    protected $table = 'role_abilities'; // مطابق للجدول
    protected $fillable = ['role_id', 'ability', 'type'];

    public function role()
    {
        return $this->belongsTo(Role::class);
    }
}


