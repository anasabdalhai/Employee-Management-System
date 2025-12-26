<?php
namespace App\Concerns;
trait HasRole {
public function roles(){
return $this->morphToMany(Role::class,'authorizable','role_member');

}


public function hasAbility($ability){
// عشان يعمل فحض للضلاحيات للرول لان كل رول يحوي على العديد من الابيلتي
    return $this->roles()->whereHas('abilities',function($query) use($ability){
        // ال ابيلتي الموجودة في قاعدة البيانات تساوي المتحقق منها
        $query->where('ability',$ability)
        // اذا تساوو رجع هذه الضلاحيه
        ->where('type','allow')
        ;

 } )->exists();
}}