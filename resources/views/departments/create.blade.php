<style>
/* ===== الخلفية العامة للصفحة ===== */
.content-wrapper {
    background: linear-gradient(135deg, #0f2027, #203a43, #2c5364);
    min-height: 100vh;      /* يمكنك تقليلها إذا أردت أقل من ارتفاع الشاشة */
    padding: 1rem;           /* تقليل الحشوة من 2px إلى 1rem */
}

/* ===== الكارد العام ===== */
.card.card-primary {

    width: 900px;       /* العرض الثابت */
    max-width: 100%;    /* لا يتجاوز عرض الشاشة */
    margin: 0 auto;     /* لتوسيط الكارد */


    background: rgba(255, 255, 255, 0.06) !important;
    backdrop-filter: blur(12px);
    border-radius: 16px;        /* تقليل نصف القطر قليلاً */
    border: 1px solid rgba(255,255,255,0.12);
    box-shadow: 0 6px 20px rgba(0,0,0,0.5); /* تقليل الظل */
    color: #fff;
    overflow: hidden;
}

/* ===== رأس الكارد ===== */
.card.card-primary .card-header {
    background: linear-gradient(90deg, #141e30, #243b55);
    border-bottom: 1px solid rgba(255,255,255,0.1);
    box-shadow: 0 4px 12px rgba(0,0,0,0.4); /* تقليل الظل */
    padding: 12px 16px; /* تقليل الحشوة */
}

.card.card-primary .card-header h3 {
    margin: 0;
    font-size: 16px; /* تصغير حجم الخط */
    font-weight: 600;
    color: #00c6ff;
    display: flex;
    align-items: center;
    gap: 6px;
}

/* ===== جسم الكارد ===== */
.card.card-primary .card-body {
    background: rgba(255, 255, 255, 0.04);
    border-radius: 0 0 16px 16px;
    padding: 16px; /* تقليل الحشوة */
}

/* ===== العناوين ===== */
.card.card-primary .card-body label {
    color: #ddd;
    font-weight: 600;
    margin-bottom: 4px; /* تقليل المسافة */
}

/* ===== الحقول النصية و textarea ===== */
.card.card-primary .form-control {
    background: rgba(0, 0, 0, 0.35);
    border: 1px solid rgba(255,255,255,0.15);
    color: #fff;
    border-radius: 12px;
    padding: 8px 12px; /* تقليل الحشوة */
    transition: 0.3s ease-in-out;
    width: 100%;
    resize: vertical;
}

.card.card-primary .form-control::placeholder {
    color: #aaa;
}

/* فوكس على الحقول */
.card.card-primary .form-control:focus {
    background: rgba(0, 0, 0, 0.45);
    border-color: #00c6ff;
    box-shadow: 0 0 8px rgba(0,198,255,0.4); /* تقليل حجم الظل */
    color: #fff;
}

/* Select + Option */
.card.card-primary select.form-control {
    cursor: pointer;
    background: rgba(0, 0, 0, 0.4);
}

.card.card-primary select.form-control option {
    background: #141e30;
    color: #fff;
}

/* المسافات بين الحقول */
.card.card-primary .form-group {
    margin-bottom: 12px; /* تقليل المسافة */
}

/* زر الإرسال داخل card-footer */
.card.card-primary .card-footer {
    background: rgba(255, 255, 255, 0.02);
    padding: 12px 16px; /* تقليل الحشوة */
    text-align: right;
    border-top: 1px solid rgba(255,255,255,0.1);
}

.card.card-primary .card-footer .btn {
    background: linear-gradient(90deg, #00c6ff, #0072ff);
    border: none;
    color: white;
    padding: 8px 16px; /* تقليل الحجم */
    border-radius: 12px;
    font-weight: 600;
    box-shadow: 0 4px 12px rgba(0,114,255,0.35); /* تقليل الظل */
    transition: 0.25s ease-in-out;
}

.card.card-primary .card-footer .btn:hover {
    transform: translateY(-1px);
    box-shadow: 0 6px 16px rgba(0,114,255,0.5);
}

/* ===== تنبيهات الأخطاء ===== */
.card.card-primary .alert-danger {
    background: rgba(255, 65, 65, 0.2);
    color: #ffb3b3;
    border: 1px solid rgba(255, 65, 65, 0.4);
    border-radius: 12px;
    box-shadow: 0 4px 12px rgba(0,0,0,0.3);
}

/* تنبيهات النجاح */
.card.card-primary .alert-success {
    background: rgba(0, 255, 140, 0.2);
    color: #00ff8c;
    border: 1px solid rgba(0, 255, 140, 0.4);
    border-radius: 12px;
    box-shadow: 0 4px 12px rgba(0,0,0,0.3);
}

/* زر الإغلاق داخل التنبيه */
.card.card-primary .btn-close {
    filter: invert(1);
}
</style>

@extends('layouts.dashboard')
@section('title')
Depatments
@endsection
@section('page_title') 
  <h1> Create Depatments</h1>
@endsection
@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('departments.index') }}">Depatments</a></li>
<li class="breadcrumb-item active">Create Depatments</li>
@endsection

@section('content')
<div class="row">
    <!-- left column -->
    <div class="col-md-12">
        <!-- jquery validation -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Create <small>Department</small></h3>
            </div>

            <!-- form start -->
            <form action="{{ route('departments.store') }}" method="POST">
                @csrf
                
                @include('departments._form')

                <!-- /.card-body -->
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Save Department</button>
                </div>
            </form>
        </div>
        <!-- /.card -->
    </div>

    <!-- right column -->
    <div class="col-md-6">
    </div>
    <!--/.col (right) -->
</div>
@endsection
