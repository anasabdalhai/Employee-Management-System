<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Role extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    // إنشاء Role مع القدرات
    public static function createWithAbilities(Request $request)
    {
        $role = self::create([
            'name' => $request->name,
        ]);

        foreach ($request->abilities as $ability => $value) {
            RoleAbility::create([
                'role_id' => $role->id,
                'ability' => $ability,
                'type' => $value
            ]);
        }

        return $role;
    }

    // العلاقة مع القدرات (one-to-many)
    public function abilities()
    {
        return $this->hasMany(RoleAbility::class, 'role_id');
    }

    // تحديث Role مع القدرات
    public function updateWithAbilities(Request $request)
    {
        $this->update([
            'name' => $request->name,
        ]);

        foreach ($request->abilities as $ability => $value) {
            RoleAbility::updateOrCreate(
                [
                    'role_id' => $this->id,
                    'ability' => $ability,
                ],
                [
                    'type' => $value
                ]
            );
        }

        return $this;
    }

    // الدور يمكن أن يرتبط بعدة مستخدمين
    // public function users()
    // {
    //     return $this->belongsToMany(User::class, 'role_user');
    // }
}
