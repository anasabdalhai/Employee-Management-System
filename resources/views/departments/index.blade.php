<style>

/* ===== خلفية الصفحة بالكامل ===== */
.content-wrapper {
    background: linear-gradient(135deg, #0f2027, #203a43, #2c5364);
    min-height: 100vh;
 
    padding: 20px;
    /* تحريك محتوى الصفحة بعيداً عن اليسار بمقدار 305px */
}


/* ===== الكاردات ===== */
.card {
    background: rgba(255, 255, 255, 0.06) !important;
    backdrop-filter: blur(10px);
    border-radius: 18px;
    border: 1px solid rgba(255,255,255,0.1);
    box-shadow: 0 10px 30px rgba(0,0,0,0.6);
    color: #fff;
}

/* ===== رؤوس الكاردات ===== */
.card-header {
    background: linear-gradient(90deg, #141e30, #243b55) !important;
    color: #fff !important;
    border-radius: 18px 18px 0 0;
}

/* ===== الجدول ===== */
.table {
    color: #eee;
}

.table thead {
    background: rgba(0,0,0,0.4);
}

/* ✅ ✅ تأثير الهفر الغامق */
.table-hover tbody tr:hover {
    background: rgba(0, 0, 0, 0.45) !important;
    color: #fff !important;
    transition: 0.3s ease-in-out;
}

/* ✅ ✅ تأثير الضغط على الصف */
.table-hover tbody tr:active {
    background: rgba(0, 0, 0, 0.75) !important;
    color: #00c6ff !important;
    transform: scale(0.99);
}

/* ✅ ✅ عند التركيز داخل الصف */
.table-hover tbody tr:focus-within {
    background: rgba(0, 0, 0, 0.65) !important;
    box-shadow: inset 0 0 0 1px #00c6ff;
}

/* ✅ ✅ عند الضغط على أي زر داخل الجدول */
.table-hover tbody tr td a:active,
.table-hover tbody tr td button:active {
    transform: scale(0.95);
}

/* ===== البريدرام ===== */
.breadcrumb {
    background: rgba(255,255,255,0.05);
    border-radius: 15px;
    padding: 10px 15px;
}

.breadcrumb-item {
    color: #ccc;
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

/* ===== المدخلات ===== */
.form-control {
    background: rgba(255,255,255,0.07);
    border: 1px solid rgba(255,255,255,0.2);
    color: white;
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

/* ===== Glass Card ===== */
.glass-card {
    background: rgba(255, 255, 255, 0.06);
    backdrop-filter: blur(12px);
    border-radius: 18px;
    border: 1px solid rgba(255,255,255,0.15);
    color: white;
    box-shadow: 0 8px 25px rgba(0,0,0,0.5);
}

/* ===== Modern Table ===== */
.modern-table thead {
    background: linear-gradient(90deg, #141e30, #243b55);
    color: white;
    margin-left: 10%;
}

.modern-table tbody tr {
    transition: 0.2s ease-in-out;
}

.modern-table tbody tr:hover {
    background: rgba(0, 0, 0, 0.5);
    transform: scale(1.01);
    color: #fff;
}

/* ===== زر الإنشاء العصري ===== */
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

.btn-icon-delete {
    background: linear-gradient(90deg, #ff416c, #ff4b2b);
    border: none;
    color: white;
    border-radius: 50%;
    padding: 7px 10px;
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
.card-header.table-header {
    width: 95%;              /* نفس عرض الجدول */
    margin-left: 60px;          /* وضعه في المنتصف */
    border-radius: 2px;     /* نفس تنسيق الكارد للانسجام */
    padding: 12px 20px;
    text-align: left;        /* أو center لو تريده بالوسط */
}

</style>



    

@extends('layouts.dashboard')

@section('title')
Departments
@endsection

@section('page_title') 
  <h1>Departments</h1>
@endsection

@section('breadcrumb')
<li class="breadcrumb-item active">Departments</li>
@endsection



@section('content')

{{-- عرض الاشعارات --}}
@if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
    </div>
@endif

@if (session('update'))
    <div class="alert alert-info alert-dismissible fade show" role="alert">
        {{ session('update') }}
    </div>
@endif

@if (session('delete'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('delete') }}
    </div>
@endif

@if (session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('error') }}
    </div>
@endif

{{-- زر الإنشاء --}}
<div class="row mb-3">
    <div class="col text-right">
        <a href="{{ route('departments.create') }}" class="btn btn-glass">
            Create Department
        </a>
    </div>
</div>

<!-- جدول عرض الأقسام -->
<div class="row ">
    <div class="col-12">
        <div class="card glass-card">

            <div class="card-header">
                <h3 class="card-title">Departments Table</h3>
            </div>

            <div class="card-body table-responsive p-0">
                <table class="table table-hover modern-table text-nowrap">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Manager ID</th>
                            <th>Created At</th>
                            <th>Updated At</th>
                            <th colspan="2">Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($departments as $dept)
                        <tr>
                            <td>{{ $dept->id }}</td>
                            <td>{{ $dept->name }}</td>
                            <td>{{ $dept->manager_id }}</td>
                            <td>{{ $dept->created_at }}</td>
                            <td>{{ $dept->updated_at }}</td>

                            <td>
                                <a href="{{ route('departments.edit', $dept->id) }}" 
                                   class="btn btn-icon-edit btn-sm">
                                    <i class="fas fa-edit"></i>
                                </a>
                               

                                <form action="{{ route('departments.destroy', $dept->id) }}" 
                                      method="POST"
                                      style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')

                                    <button class="btn btn-icon-delete btn-sm"
                                            onclick="return confirm('Are you sure?')">
                                        <i class="fas fa-trash"></i>
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

