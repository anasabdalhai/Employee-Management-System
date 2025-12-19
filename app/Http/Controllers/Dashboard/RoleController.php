<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Role;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::paginate(10);
        return view('roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $role = new Role(); // إنشاء كائن فارغ
        return view('roles.create', compact('role'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // التحقق من البيانات
      $validated = $request->validate([
    'name'      => 'required|string|max:255',
    'abilities' => 'required|array',
    'abilities.*' => 'required|in:allow,deny,inherit',
]);

        // إنشاء الصلاحية
        // $role = new Role();
        // $role->name        = $validated['name'];
        // $role->abilites= $validated['abdilites'];
        // $role->description = $validated['description'] ?? null;
        // $role->save();
        // عم مرر الrequestللمودل role
        $role=Role::createwithAbilities($request);

        // إعادة التوجيه بعد الحفظ
        return redirect()->route('roles.index')
                         ->with('success', 'Role created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role)
    {
        // $role = Role::findOrFail($id);
        //                                          value   key
        $roles_abilities= $role->abilities->pluck('type','ability')->toArray();
        
return view('roles.edit', [
    'role' => $role,
    'roles_abilities' => $roles_abilities, // نفس اسم المتغير
]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Role  $role)
    {
          $request->validate([
    'name' => 'required|max:50|unique:roles,name,' . $role->id,
    'abilities' => 'required|array',
    // الحقل 'type' غير موجود في الفورم بشكل مباشر، ربما يمكن حذفه من هنا
]);


        $role->updatewithAbilities($request);
     

        return redirect()->route('roles.index')
                         ->with('update', 'Role updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( Role $role)
    {
         Role::destroy($role->id);

        

        return redirect()->route('roles.index')
                         ->with('delete', 'Role deleted successfully!');
    }
}
