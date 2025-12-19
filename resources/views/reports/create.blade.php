<style>

/* ===== الخلفية العامة للصفحة ===== */
.content-wrapper {
    background: linear-gradient(135deg, #0f2027, #203a43, #2c5364);
    min-height: 100vh;
    padding: 20px;
}


/* ===== الكارد العام ===== */
.card {
    background: rgba(255, 255, 255, 0.06) !important;
    backdrop-filter: blur(12px);
    border-radius: 20px;
    border: 1px solid rgba(255,255,255,0.12);
    box-shadow: 0 10px 30px rgba(0,0,0,0.6);
    color: #fff;
    overflow: hidden;
     width: 900px;      /* تحديد عرض ثابت للكارد */
    max-width: 100%;   /* لا يتجاوز عرض الشاشة على الأجهزة الصغيرة */
    margin: 0 auto;
}

/* ===== رأس الكارد ===== */
.card .card-header {
    background: linear-gradient(90deg, #141e30, #243b55);
    border-bottom: 1px solid rgba(255,255,255,0.1);
    box-shadow: 0 6px 18px rgba(0,0,0,0.5);
    padding: 16px 22px;
}

.card .card-header h3 {
    margin: 0;
    font-size: 18px;
    font-weight: 600;
    color: #00c6ff;
    display: flex;
    align-items: center;
    gap: 8px;
}

/* ===== جسم الكارد ===== */
.card .card-body {
    background: rgba(255, 255, 255, 0.04);
    border-radius: 0 0 20px 20px;
    padding: 25px;
}

/* ===== العناوين ===== */
.card .card-body label {
    color: #ddd;
    font-weight: 600;
    margin-bottom: 6px;
}

/* ===== الحقول النصية و textarea ===== */
.card .form-control {
    background: rgba(0, 0, 0, 0.35);
    border: 1px solid rgba(255,255,255,0.15);
    color: #fff;
    border-radius: 14px;
    padding: 10px 14px;
    transition: 0.3s ease-in-out;
    width: 100%;
    resize: vertical; /* textarea يمكن تغيير الحجم */
}

.card .form-control::placeholder {
    
    color: #aaa;
}

/* فوكس على الحقول */
.card .form-control:focus {
    background: rgba(0, 0, 0, 0.5);
    border-color: #00c6ff;
    box-shadow: 0 0 12px rgba(0,198,255,0.45);
    color: #fff;
}

/* Select + Option */
.card select.form-control {
    cursor: pointer;
    background: rgba(0, 0, 0, 0.45);
}

.card select.form-control option {
    background: #141e30;   /* داكن */
    color: #fff;
}

/* المسافات بين الحقول */
.card .form-group {
    margin-bottom: 18px;
}

/* زر الإرسال داخل card-footer */
.card .card-footer {
    background: rgba(255, 255, 255, 0.02);
    padding: 20px 25px;
    text-align: right;
    border-top: 1px solid rgba(255,255,255,0.1);
}

.card .card-footer .btn {
    background: linear-gradient(90deg, #00c6ff, #0072ff);
    border: none;
    color: white;
    padding: 10px 22px;
    border-radius: 14px;
    font-weight: 600;
    box-shadow: 0 5px 15px rgba(0,114,255,0.45);
    transition: 0.25s ease-in-out;
}

.card .card-footer .btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 22px rgba(0,114,255,0.7);
}

/* ===== تنبيهات الأخطاء ===== */
.card .alert-danger {
    background: rgba(255, 65, 65, 0.2);
    color: #ffb3b3;
    border: 1px solid rgba(255, 65, 65, 0.4);
    border-radius: 14px;
    box-shadow: 0 6px 18px rgba(0,0,0,0.4);
}

/* تنبيهات النجاح */
.card .alert-success {
    background: rgba(0, 255, 140, 0.2);
    color: #00ff8c;
    border: 1px solid rgba(0, 255, 140, 0.4);
    border-radius: 14px;
    box-shadow: 0 6px 18px rgba(0,0,0,0.4);
}

/* زر الإغلاق داخل التنبيه */
.card .btn-close {
    filter: invert(1);
}


</style>
@extends('layouts.dashboard')

@section('title')
Reports
@endsection

@section('page_title') 
<h1>Create Report</h1>
@endsection

@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('reports.index') }}">Reports</a></li>
<li class="breadcrumb-item active">Create Report</li>
@endsection

@section('content')
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Create New Report</h3>
      </div>
      <!-- /.card-header -->
      <form action="{{ route('reports.store') }}" method="POST">
        @csrf
        @include('reports._form')
        <div class="card-footer">
          <button type="submit" class="btn btn-primary">Save Report</button>
        </div>
      </form>
    </div>
    <!-- /.card -->
  </div>
</div>
@endsection
