<style>/* ===== خلفية الصفحة بالكامل ===== */
.content-wrapper {
    background: linear-gradient(135deg, #0f2027, #203a43, #2c5364);
    min-height: 100vh;
    padding: 20px;
    
}

/* ===== الكاردات ===== */
.card {
    background: rgba(255, 255, 255, 0.06) !important;
    backdrop-filter: blur(10px);
    border-radius: 18px;
    border: 1px solid rgba(255,255,255,0.1);
    box-shadow: 0 10px 30px rgba(0,0,0,0.6);
    color: #fff;
        /* width: 950px;      تحديد عرض ثابت للكارد
    max-width: 100%;   لا يتجاوز عرض الشاشة على الأجهزة الصغيرة
    margin: 0 auto; */
    
}

/* ===== Glass Card ===== */
.glass-card {
    background: rgba(255, 255, 255, 0.06) !important;
    backdrop-filter: blur(12px);
    border-radius: 18px;
    border: 1px solid rgba(255,255,255,0.15);
    color: white;
    box-shadow: 0 8px 25px rgba(0,0,0,0.5);
}

/* ===== رؤوس الكاردات ===== */
.card-header {
    background: linear-gradient(90deg, #141e30, #243b55) !important;
    color: #fff !important;
    border-radius: 18px 18px 0 0;
}

/* ===== الجداول ===== */
.table {
    color: #eee;
}

.table thead {
    background: rgba(0,0,0,0.4);
}

/* ✅ هفر غامق أنيق */
.table-hover tbody tr {
    transition: 0.3s ease-in-out;
}

.table-hover tbody tr:hover {
    background: rgba(0, 0, 0, 0.45) !important;
    color: #fff !important;
    transform: scale(1.01);
}

.table-hover tbody tr:hover td,
.table-hover tbody tr:hover th {
    color: #fff !important;
    font-weight: 500;
}

/* ===== Modern Table ===== */
.modern-table thead {
    background: linear-gradient(90deg, #141e30, #243b55);
    color: white;
}

.modern-table tbody tr {
    transition: 0.2s ease-in-out;
}

.modern-table tbody tr:hover {
    background: rgba(0, 0, 0, 0.5);
    color: #fff;
    transform: scale(1.01);
}

/* ===== العناوين ===== */
h1, h2, h3, h4, h5 {
    color: #fff;
}

/* ===== الأزرار ===== */
.btn {
    border-radius: 12px;
    font-weight: 500;
}

/* زر الإنشاء */
.btn-glass {
    background: linear-gradient(90deg, #00c6ff, #0072ff);
    border: none;
    color: white;
    padding: 10px 18px;
    border-radius: 14px;
    box-shadow: 0 5px 15px rgba(0,114,255,0.4);
    transition: 0.3s;
}

.btn-glass:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 20px rgba(0,114,255,0.6);
}

/* ===== أزرار العمليات ===== */
.btn-icon-edit {
    background: linear-gradient(90deg, #36d1dc, #5b86e5);
    border: none;
    color: white;
    border-radius: 50%;
    padding: 7px 10px;
}

.btn-icon-edit:hover {
    opacity: 0.85;
}

.btn-icon-delete {
    background: linear-gradient(90deg, #ff416c, #ff4b2b);
    border: none;
    color: white;
    border-radius: 50%;
    padding: 7px 10px;
}

.btn-icon-delete:hover {
    opacity: 0.85;
}

/* ===== Badges ناعمة ===== */
.badge-soft-success {
    background: rgba(0,255,140,0.2);
    color: #00ff8c;
    padding: 6px 14px;
    border-radius: 20px;
}

.badge-soft-danger {
    background: rgba(255,65,65,0.2);
    color: #ff4b4b;
    padding: 6px 14px;
    border-radius: 20px;
}

/* ===== المدخلات ===== */
.form-control {
    background: rgba(255,255,255,0.07);
    border: 1px solid rgba(255,255,255,0.2);
    color: white;
    border-radius: 12px;
}

.form-control::placeholder {
    color: #aaa;
}

.form-control:focus {
    background: rgba(255,255,255,0.12);
    border-color: #00c6ff;
    color: white;
    box-shadow: 0 0 10px rgba(0,198,255,0.4);
}

/* ===== الإشعارات ===== */
.alert {
    border-radius: 15px;
    font-weight: bold;
    box-shadow: 0 8px 25px rgba(0,0,0,0.4);
}

.custom-alert {
    border-radius: 12px;
    box-shadow: 0 4px 15px rgba(0,0,0,0.2);
    font-weight: bold;
}

/* ===== Breadcrumb ===== */
.breadcrumb {
    background: rgba(255,255,255,0.05);
    border-radius: 15px;
    padding: 10px 15px;
}

.breadcrumb-item {
    color: #ccc;
}
</style>

@extends('layouts.dashboard')

@section('title')
Tasks
@endsection

@section('page_title') 
  <h1>Tasks</h1>
@endsection

@section('breadcrumb')
<li class="breadcrumb-item active">Tasks</li>
@endsection

@section('content')

{{-- عرض الاشعارات --}}
@if (session('success'))
    <div class="alert alert-success alert-dismissible fade show custom-alert" role="alert">
        {{ session('success') }}
    </div>
@endif

@if (session('update'))
    <div class="alert alert-info alert-dismissible fade show custom-alert" role="alert">
        {{ session('update') }}
    </div>
@endif

@if (session('delete'))
    <div class="alert alert-danger alert-dismissible fade show custom-alert" role="alert">
        {{ session('delete') }}
    </div>
@endif

@if (session('error'))
    <div class="alert alert-danger alert-dismissible fade show custom-alert" role="alert">
        {{ session('error') }}
    </div>
@endif


{{-- زر الإنشاء --}}
<div class="row mb-3">
    <div class="col text-right">
        <a href="{{ route('tasks.create') }}" class="btn btn-glass">
            + Create Task
        </a>
    </div>
</div>


{{-- الجدول --}}
<div class="row">
    <div class="col-12">
        <div class="card glass-card">

            <div class="card-header">
                <h3 class="card-title">Tasks Table</h3>
            </div>

            <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap modern-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Employee</th>
                            <th>Department</th>
                            <th>Status</th>
                            <th>Created At</th>
                            <th colspan="2">Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($tasks as $task)
                        <tr>
                            <td>{{ $task->id }}</td>
                            <td>{{ $task->title }}</td>
                            <td>{{ Str::limit($task->description, 40) }}</td>
                            <td>{{ $task->employee?->first_name }} {{ $task->employee?->last_name }}</td>
                            <td>{{ $task->department?->name }}</td>

                            <td>
                                @if($task->status === 'completed')
                                    <span class="badge-soft-success">Completed</span>
                                @elseif($task->status === 'pending')
                                    <span class="badge bg-warning">Pending</span>
                                @else
                                    <span class="badge bg-secondary">{{ $task->status }}</span>
                                @endif
                            </td>

                            <td>{{ $task->created_at->format('Y-m-d') }}</td>

                            <td>
                                <a href="{{ route('tasks.edit', $task->id) }}" 
                                   class="btn btn-icon-edit btn-sm">
                                    ✎
                                </a>

                                <form action="{{ route('tasks.destroy', $task->id) }}" 
                                      method="POST" 
                                      style="display:inline-block;">
                                    
                                    @csrf
                                    @method('DELETE')

                                    <button class="btn btn-icon-delete btn-sm"
                                            onclick="return confirm('Are you sure?')">
                                        🗑
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>

        </div>
    </div>
</div>

@endsection
