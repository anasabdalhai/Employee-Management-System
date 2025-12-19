
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
}

/* ===== رؤوس الكاردات ===== */
.card-header {
    background: linear-gradient(90deg, #141e30, #243b55) !important;
    color: #fff !important;
    border-radius: 18px 18px 0 0;
}
/* ✅ ✅ هفر غامق أنيق لسطر البيانات داخل جدول الـ Roles */
.table-hover tbody tr {
    transition: 0.2s ease-in-out;
}

.table-hover tbody tr:hover {
    background: rgba(0, 0, 0, 0.5) !important;
    transform: scale(1.01);
    color: #fff !important;
}

.table-hover tbody tr:hover td,
.table-hover tbody tr:hover th {
    color: #fff !important;
    font-weight: 500;
}

/* ===== الجدول ===== */
.table {
    color: #eee;
}

.table thead {
    background: rgba(0,0,0,0.4);
}

/* ✅ هفر غامق فخم */
.table-hover tbody tr:hover {
    background: rgba(0, 0, 0, 0.55) !important;
    color: #fff !important;
    transition: 0.25s ease-in-out;
}

.table-hover tbody tr:hover td,
.table-hover tbody tr:hover th {
    color: #fff !important;
    font-weight: 500;
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

/* زر الإنشاء الزجاجي */
.btn-primary {
    background: linear-gradient(90deg, #00c6ff, #0072ff);
    border: none;
    box-shadow: 0 6px 18px rgba(0,114,255,0.5);
}

.btn-primary:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 22px rgba(0,114,255,0.7);
}

/* أزرار العمليات */
.btn-success {
    background: linear-gradient(90deg, #36d1dc, #5b86e5);
    border: none;
}

.btn-danger {
    background: linear-gradient(90deg, #ff416c, #ff4b2b);
    border: none;
}

/* ===== الإشعارات ===== */
.alert {
    border-radius: 15px;
    font-weight: bold;
    box-shadow: 0 8px 25px rgba(0,0,0,0.4);
}

/* ===== Badges ناعمة ===== */
.badge {
    padding: 6px 14px;
    border-radius: 20px;
    font-size: 13px;
}

.bg-info {
    background: rgba(0, 198, 255, 0.25) !important;
    color: #00c6ff;
}
</style>
@extends('layouts.dashboard')
@section('title') Members @endsection
@section('page_title') <h1>Members</h1> @endsection
@section('breadcrumb')
<li class="breadcrumb-item active">Members</li>
@endsection

@section('content')
@if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif
@if(session('update'))
<div class="alert alert-info">{{ session('update') }}</div>
@endif
@if(session('delete'))
<div class="alert alert-danger">{{ session('delete') }}</div>
@endif

<div class="row mb-2">
    <div class="col text-right">
        <a href="{{ route('members.create') }}" class="btn btn-primary">Create Member</a>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header"><h3 class="card-title">Member Table</h3></div>
            <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Employee</th>
                            <th>Roles</th>
                            <th colspan="2">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($members as $member)
                        <tr>
                            <td>{{ $member->id }}</td>
                            <td>{{ $member->name }}</td>
                            <td>{{ $member->email }}</td>
                            <td>{{ $member->employee?->first_name }} {{ $member->employee?->last_name }}</td>
                            <td>
                                @foreach($member->roles as $role)
                                    <span class="badge bg-info">{{ $role->name }}</span>
                                @endforeach
                            </td>
                            <td>
                                <a href="{{ route('members.edit', $member->id) }}" class="btn btn-success btn-sm">Edit</a>
                            </td>
                            <td>
                                <form action="{{ route('members.destroy', $member->id) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
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
