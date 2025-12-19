<style>
/* ===== الخلفية العامة للصفحة ===== */
.content-wrapper {
    background: linear-gradient(135deg, #0f2027, #203a43, #2c5364);
    min-height: 100vh;
    padding: 20px;
}

/* ===== الكارد الرئيسي ===== */
.card {
    background: rgba(255, 255, 255, 0.06) !important;
    backdrop-filter: blur(12px);
    border-radius: 20px;
    border: 1px solid rgba(255,255,255,0.12);
    box-shadow: 0 10px 30px rgba(0,0,0,0.6);
    color: #fff;
    overflow: hidden;
}

/* ===== رأس الفورم ===== */
.form-header {
    background: linear-gradient(90deg, #141e30, #243b55);
    padding: 16px 22px;
    border-bottom: 1px solid rgba(255,255,255,0.1);
    box-shadow: 0 6px 18px rgba(0,0,0,0.5);
}

.form-header h3 {
    margin: 0;
    font-size: 18px;
    font-weight: 600;
    color: #00c6ff;
    display: flex;
    align-items: center;
    gap: 8px;
}

/* ===== جسم الفورم ===== */
.card-body {
    background: rgba(255, 255, 255, 0.04);
    border-radius: 0 0 20px 20px;
    padding: 25px;
    display: flex;
    flex-wrap: wrap; /* يسمح بالانتقال للسطر التالي */
    gap: 20px;       /* مسافة بين الحقول */
}

/* ===== العناوين ===== */
.card-body label {
    color: #ddd;
    font-weight: 600;
    margin-bottom: 6px;
}

/* ===== الحقول ===== */
.card-body .form-control {
    background: rgba(0, 0, 0, 0.35);
    border: 1px solid rgba(255,255,255,0.15);
    color: #fff;
    border-radius: 14px;
    padding: 8px 14px;
    transition: 0.3s ease-in-out;
    width: 100%;
    line-height: 1.6;
}

/* فوكس على الحقول */
.card-body .form-control:focus {
    background: rgba(0, 0, 0, 0.5);
    border-color: #00c6ff;
    box-shadow: 0 0 12px rgba(0,198,255,0.45);
    color: #fff;
}

/* Select + Option */
.card-body select.form-control {
    cursor: pointer;
    background: rgba(0, 0, 0, 0.45);
}

.card-body select.form-control option {
    background: #141e30;
    color: #fff;
}

/* ===== ترتيب الحقول جنب بعض ===== */
.card-body .form-group {
    flex: 1 1 calc(33.333% - 20px); /* ثلاثة حقول في الصف */
    min-width: 220px;
    display: flex;
    flex-direction: column;
}

/* ===== الحقول الكبيرة تأخذ العرض الكامل ===== */
.card-body .form-group.full-width {
    flex: 1 1 100%;
}

/* ===== تنبيهات الأخطاء ===== */
.alert-danger {
    background: rgba(255, 65, 65, 0.2);
    color: #ffb3b3;
    border: 1px solid rgba(255, 65, 65, 0.4);
    border-radius: 14px;
    box-shadow: 0 6px 18px rgba(0,0,0,0.4);
    width: 100%;
}

/* ===== تنبيهات النجاح ===== */
.alert-success {
    background: rgba(0, 255, 140, 0.2);
    color: #00ff8c;
    border: 1px solid rgba(0, 255, 140, 0.4);
    border-radius: 14px;
    box-shadow: 0 6px 18px rgba(0,0,0,0.4);
    width: 100%;
}

/* زر الإغلاق داخل التنبيه */
.btn-close {
    filter: invert(1);
}

/* ===== زر Create ===== */
.btn-create {
    background: linear-gradient(90deg, #00c6ff, #0072ff);
    border: none;
    color: white;
    padding: 10px 22px;
    border-radius: 14px;
    font-weight: 600;
    box-shadow: 0 5px 15px rgba(0,114,255,0.45);
    transition: 0.25s ease-in-out;
}

.btn-create:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 22px rgba(0,114,255,0.7);
}
</style>

<div class="card-body">
@if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@if (session('success'))
    <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
        <strong>نجاح!</strong> {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

    <div class="form-group">
        <label for="firstName">First Name</label>
        <input type="text" name="first_name" class="form-control" id="firstName" placeholder="Enter first name" maxlength="50" value="{{ old('first_name', $employee->first_name) }}">
    </div>

    <div class="form-group">
        <label for="lastName">Last Name</label>
        <input type="text" name="last_name" class="form-control" id="lastName" placeholder="Enter last name" maxlength="50" value="{{ old('last_name', $employee->last_name) }}">
    </div>

    <div class="form-group">
        <label for="gender">Gender</label>
        <select name="gender" class="form-control" id="gender">
            <option value="">Select…</option>
            <option value="male" {{ old('gender', $employee->gender) == 'male' ? 'selected' : '' }}>Male</option>
            <option value="female" {{ old('gender', $employee->gender) == 'female' ? 'selected' : '' }}>Female</option>
        </select>
    </div>

    <div class="form-group">
        <label for="emailField">Email</label>
        <input type="email" name="email" class="form-control" id="emailField" placeholder="Enter email" maxlength="100" value="{{ old('email', $employee->email) }}">
    </div>

    <div class="form-group">
        <label for="phoneField">Phone</label>
        <input type="text" name="phone" class="form-control" id="phoneField" placeholder="Enter phone" maxlength="20" value="{{ old('phone', $employee->phone) }}">
    </div>

    <div class="form-group">
        <label for="departmentField">Department</label>
        <select name="department_id" class="form-control" id="departmentField">
            <option value="">Select department</option>
            @foreach($departments as $dept)
                <option value="{{ $dept->id }}" {{ old('department_id', $employee->department_id) == $dept->id ? 'selected' : '' }}>
                    {{ $dept->name }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="salaryField">Salary</label>
        <input type="number" step="0.01" name="salary" class="form-control" id="salaryField" placeholder="Enter salary" value="{{ old('salary', $employee->salary) }}">
    </div>

    <div class="form-group">
        <label for="hireDate">Hire Date</label>
        <input type="date" name="hire_date" class="form-control" id="hireDate" value="{{ old('hire_date', $employee->hire_date ? $employee->hire_date->format('Y-m-d') : '') }}">
    </div>

    <div class="form-group">
        <label for="statusField">Status</label>
        <select name="status" class="form-control" id="statusField">
            <option value="active" {{ old('status', $employee->status) == 'active' ? 'selected' : '' }}>Active</option>
            <option value="inactive" {{ old('status', $employee->status) == 'inactive' ? 'selected' : '' }}>Inactive</option>
        </select>
    </div>

</div>
