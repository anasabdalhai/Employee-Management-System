<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AbilityMiddleware
{

    public function handle($request, Closure $next, $ability)
    {
        $member = auth()->user(); // مستخدم من جدول members

        // تحقق من تسجيل الدخول
        if (!$member) {
            abort(403, 'يجب تسجيل الدخول للوصول لهذه الصفحة.');
        }

        // احصل على القيمة الحقيقية من config/abilities.php
        $realAbility = $this->resolveAbility($ability);

        // تحقق من الصلاحية
        if (!$member->hasAbility($realAbility)) {
            abort(403, 'لا تملك الصلاحية للوصول لهذه الصفحة.');
        }

        return $next($request);
    }

    /**
     * تحويل اسم الـ ability في الراوت إلى القيمة الموجودة في config/abilities.php
     */
    protected function resolveAbility($ability)
    {
        $abilities = config('abilites'); // نفس اسم الملف في config


        // ابحث في جميع الأقسام
        foreach ($abilities as $section => $list) {
            if (isset($list[$ability])) {
                return $list[$ability];
            }
        }

        // إذا لم يتم العثور عليها، أعد الاسم كما هو
        return $ability;
    }
}
