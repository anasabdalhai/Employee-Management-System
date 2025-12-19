<style>/* ===== خلفية الصفحة بالكامل ===== */
.content-wrapper {
    background: linear-gradient(135deg, #0f2027, #203a43, #2c5364);
    min-height: 100vh;
    padding: 20px;
}

/* ===== الكارد ===== */
.card {
    background: rgba(255, 255, 255, 0.06) !important;
    backdrop-filter: blur(10px);
    border-radius: 18px;
    border: 1px solid rgba(255,255,255,0.1);
    box-shadow: 0 10px 30px rgba(0,0,0,0.6);
    color: #fff;
}

/* ===== رأس الكارد ===== */
.card-header {
    background: linear-gradient(90deg, #141e30, #243b55) !important;
    color: #fff !important;
    border-radius: 18px 18px 0 0;
    border-bottom: 1px solid rgba(255,255,255,0.08);
}

/* ===== جسم الفورم ===== */
.card-body {
    background: rgba(255, 255, 255, 0.04);
    border-radius: 18px;
    padding: 25px;
}

/* ===== العناوين داخل الفورم ===== */
.card-body label {
    color: #cfe9ff;
    font-weight: 600;
    margin-bottom: 6px;
}

/* ===== الحقول ===== */
.card-body .form-control {
    background: rgba(255,255,255,0.07);
    border: 1px solid rgba(255,255,255,0.2);
    color: #fff;
    border-radius: 14px;
    padding: 2px 14px;
    transition: 0.3s ease-in-out;
}

.card-body .form-control::placeholder {
    color: #aaa;
}

.card-body .form-control:focus {
    background: rgba(255,255,255,0.12);
    border-color: #00c6ff;
    box-shadow: 0 0 12px rgba(0,198,255,0.4);
    color: #fff;
}

/* ===== الحقول المقروءة فقط ===== */
.card-body .form-control[readonly] {
    background: rgba(255,255,255,0.04);
    color: #9eaec2;
    cursor: not-allowed;
}

/* ===== المسافات بين الحقول ===== */
.card-body .form-group {
    margin-bottom: 18px;
}

/* ===== الأخطاء ===== */
.alert-danger {
    background: rgba(255, 65, 65, 0.18);
    color: #ffb3b3;
    border: 1px solid rgba(255, 65, 65, 0.4);
    border-radius: 14px;
    box-shadow: 0 6px 18px rgba(0,0,0,0.4);
}

/* ===== النجاح ===== */
.alert-success {
    background: rgba(0, 198, 255, 0.15);
    color: #9ee7ff;
    border: 1px solid rgba(0, 198, 255, 0.4);
    border-radius: 14px;
    box-shadow: 0 6px 18px rgba(0,0,0,0.4);
}

/* ===== زر الإغلاق ===== */
.btn-close {
    filter: invert(1);
}

/* ===== زر الحفظ ===== */
.btn-glass {
    background: linear-gradient(90deg, #00c6ff, #0072ff);
    border: none;
    color: white !important;
    padding: 10px 20px;
    border-radius: 14px;
    box-shadow: 0 6px 18px rgba(0,114,255,0.5);
    transition: 0.3s;
}

.btn-glass:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 22px rgba(0,114,255,0.7);
}

/* ===== تقسيم عمودين تلقائيًا للشاشات الكبيرة ===== */
@media (min-width: 992px) {
    .card-body {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 18px;
    }

    .card-body .form-group:last-child {
        grid-column: 1 / -1;
    }
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

    <!-- Name -->
    <div class="form-group">
        <label for="nameField">Name</label>
        <input type="text" name="name" class="form-control" id="nameField" placeholder="Enter name" maxlength="100" value="{{ old('name', $member->name) }}">
    </div>

    <!-- Email -->
    <div class="form-group">
        <label for="emailField">Email</label>
        <input type="email" name="email" class="form-control" id="emailField" placeholder="Enter email" maxlength="100" value="{{ old('email', $member->email) }}">
    </div>

    <!-- Password -->
    <div class="form-group">
        <label for="passwordField">Password</label>
        <input type="password" name="password" class="form-control" id="passwordField" placeholder="Enter password">
    </div>

    <!-- Confirm Password -->
    <div class="form-group">
        <label for="passwordConfirmField">Confirm Password</label>
        <input type="password" name="password_confirmation" class="form-control" id="passwordConfirmField" placeholder="Confirm password">
    </div>

    <!-- Employee -->
    <div class="form-group">
        <label for="employeeField">Employee</label>
        <select name="employee_id" class="form-control" id="employeeField">
            <option value="">Select Employee</option>
            @foreach($employees as $emp)
                <option value="{{ $emp->id }}" {{ old('employee_id', $member->employee_id) == $emp->id ? 'selected' : '' }}>
                    {{ $emp->first_name }} {{ $emp->last_name }}
                </option>
            @endforeach
        </select>
    </div>

    <!-- Roles -->
    <div class="form-group">
        <label for="rolesField">Roles</label>
        <select name="roles[]" class="form-control" id="rolesField" multiple>
            @foreach($roles as $role)
                <option value="{{ $role->id }}"
                    {{ in_array($role->id, old('roles', $member->roles->pluck('id')->toArray() ?? [])) ? 'selected' : '' }}>
                    {{ $role->name }}
                </option>
            @endforeach
        </select>
        <small class="form-text text-muted">Hold Ctrl (Windows) or Cmd (Mac) to select multiple roles.</small>
    </div>
</div>
