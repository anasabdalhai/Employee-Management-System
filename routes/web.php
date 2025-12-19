<?php
// require __DIR__.'/dashboard.php';
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\EmployeeController;
use App\Http\Controllers\Dashboard\DepartmentController;
use App\Http\Controllers\Dashboard\TaskController;
use App\Http\Controllers\Dashboard\ReportController;
use App\Http\Controllers\Dashboard\MemberController;
use App\Http\Controllers\Dashboard\RoleController;
use App\Http\Controllers\DashboardController;
Route::get('/', function () {
    return view('welcome');
});




Route::get('/dashboard', [DashboardController::class, 'index']);
// routes/web.php
Route::get('/index', function () {
    return view('index'); // index.blade.php موجودة في resources/views
})->name('index');
Route::get('/layout/home', function () {
    return view('layout.home'); 
});


// employees
Route::get('/employees', [EmployeeController::class, 'index'])->name('employees.index');
Route::get('/employees/create', [EmployeeController::class, 'create']);
Route::post('/employees/store', [EmployeeController::class, 'store']);
Route::get('/employees/{id}/edit', [EmployeeController::class, 'edit'])->name('employees.edit');
Route::delete('/employees/{id}', [EmployeeController::class, 'destroy'])->name('employees.destroy');
Route::put('/employees/{id}', [EmployeeController::class, 'update']);
// departments
Route::get('/departments', [DepartmentController::class, 'index'])->name('departments.index');
Route::get('/departments/create', [DepartmentController::class, 'create'])->name('departments.create');
Route::post('departments', [DepartmentController::class, 'store'])->name('departments.store');
Route::get('/departments/{id}/edit', [DepartmentController::class, 'edit'])->name('departments.edit');
Route::delete('/departments/{id}', [DepartmentController::class, 'destroy'])->name('departments.destroy');
Route::put('/departments/{id}', [DepartmentController::class, 'update'])->name('departments.update');
// Task 
Route::get('/tasks', [TaskController::class, 'index'])->name('tasks.index');
Route::get('/tasks/create', [TaskController::class, 'create'])->name('tasks.create');
Route::post('/tasks', [TaskController::class, 'store'])->name('tasks.store');
Route::get('/tasks/{id}/edit', [TaskController::class, 'edit'])->name('tasks.edit');
Route::put('/tasks/{id}', [TaskController::class, 'update'])->name('tasks.update');
Route::delete('/tasks/{id}', [TaskController::class, 'destroy'])->name('tasks.destroy');
// reports
Route::get('/reports', [ReportController::class, 'index'])->name('reports.index');
Route::get('/reports/create', [ReportController::class, 'create'])->name('reports.create');
Route::post('/reports', [ReportController::class, 'store'])->name('reports.store');
Route::get('/reports/{id}/edit', [ReportController::class, 'edit'])->name('reports.edit');
Route::put('/reports/{id}', [ReportController::class, 'update'])->name('reports.update');
Route::delete('/reports/{id}', [ReportController::class, 'destroy'])->name('reports.destroy');
// users
Route::get('/members', [MemberController::class, 'index'])->name('members.index');
Route::get('/members/create', [MemberController::class, 'create'])->name('members.create');
Route::post('/members', [MemberController::class, 'store'])->name('members.store');
Route::get('/members/{id}/edit', [MemberController::class, 'edit'])->name('members.edit');
Route::put('/members/{id}', [MemberController::class, 'update'])->name('members.update');
Route::delete('/members/{id}', [MemberController::class, 'destroy'])->name('members.destroy');

// roles

Route::get('/roles', [RoleController::class, 'index'])->name('roles.index');
Route::get('/roles/create', [RoleController::class, 'create'])->name('roles.create');
Route::post('/roles', [RoleController::class, 'store'])->name('roles.store');
Route::get('/roles/{role}/edit', [RoleController::class, 'edit'])->name('roles.edit');
Route::put('/roles/{role}', [RoleController::class, 'update'])->name('roles.update');
Route::delete('/roles/{role}', [RoleController::class, 'destroy'])->name('roles.destroy');



// breez
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
