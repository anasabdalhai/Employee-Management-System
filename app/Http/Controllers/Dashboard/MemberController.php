<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Member;
use App\Models\Employee;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $members = Member::with('employee', 'roles')->get();
        return view('users.index', compact('members'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $employees = Employee::all();
        $roles = Role::all();
        $member = new Member();
        return view('users.create', compact('employees', 'roles', 'member'));
    }

    /**
     * Store a newly created resource in storage.
     */
public function store(Request $request)
{
    $validated = $request->validate([
        'name'        => 'required|string|max:100',
        'email'       => 'required|email|max:100|unique:members,email',
        'password'    => 'required|string|min:6|confirmed',
        'employee_id' => 'nullable|exists:employees,id',
        'roles'       => 'nullable|array',
        'roles.*'     => 'exists:roles,id',
    ]);

    // إنشاء العضو
    $member = new Member();
    $member->name = $validated['name'];
    $member->email = $validated['email'];
    $member->password = bcrypt($validated['password']);
    $member->employee_id = $validated['employee_id'] ?? null;
    $member->save();

    // ربط الأدوار
    if (!empty($validated['roles'])) {
        $member->roles()->sync($validated['roles']); // هنا يتم ملء authorizable_type و authorizable_id تلقائيًا
    }

    return redirect()->route('members.index')
                     ->with('success', 'Member created successfully!');
}


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $member = Member::findOrFail($id);
        $employees = Employee::all();
        $roles = Role::all();
        return view('users.edit', compact('member', 'employees', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $member = Member::findOrFail($id);

        $validated = $request->validate([
            'name'        => 'required|string|max:100',
            'email'       => 'required|email|max:100|unique:members,email,' . $member->id,
            'password'    => 'nullable|string|min:6|confirmed',
            'employee_id' => 'nullable|exists:employees,id',
            'roles'       => 'nullable|array',
            'roles.*'     => 'exists:roles,id',
        ]);

        $member->name = $validated['name'];
        $member->email = $validated['email'];
        if (!empty($validated['password'])) {
            $member->password = Hash::make($validated['password']);
        }
        $member->employee_id = $validated['employee_id'] ?? null;
        $member->save();

        // تحديث الصلاحيات
        $member->roles()->sync($validated['roles'] ?? []);

        return redirect()->route('members.index')
                         ->with('update', 'Member updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $member = Member::findOrFail($id);
        $member->roles()->detach();
        $member->delete();

        return redirect()->route('members.index')
                         ->with('delete', 'Member deleted successfully!');
    }
}
