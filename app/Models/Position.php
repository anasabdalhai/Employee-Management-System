<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description'];

    // المنصب يشغله عدة موظفين
    public function employees()
    {
        return $this->hasMany(Employee::class);
    }
}
