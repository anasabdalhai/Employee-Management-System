<style>
/* ===== تحسين textarea ===== */
.card-body textarea.form-control {
    min-height: 120px;
    resize: vertical;
}

/* ===== تحسين حقول التاريخ ===== */
.card-body input[type="date"].form-control {
    padding-right: 12px;
    color-scheme: dark;
}

/* ===== تحسين تحديد الحقول عند الخطأ ===== */
.card-body .is-invalid {
    border-color: rgba(255, 65, 65, 0.8) !important;
    box-shadow: 0 0 10px rgba(255, 65, 65, 0.4);
}

/* ===== ترتيب حقول التاريخ في نفس السطر ===== */
.card-body .date-row {
    display: flex;
    gap: 12px;
    align-items: flex-start;
    flex-wrap: wrap; /* يسمح بالانتقال لسطر جديد عند ضيق الشاشة */
}

.card-body .date-row .form-group {
    flex: 1;
    min-width: 120px;
}

/* ===== خلفية الصفحة بالكامل ===== */
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
    height: 600px;
    max-height: 90vh;
}

/* ===== رؤوس الكاردات ===== */
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
    padding: 5px 14px;
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

/* ===== select + option غامق ===== */
.card-body select.form-control {
    background-color: rgba(0, 0, 0, 0.6);
    color: #fff;
}

.card-body select.form-control option {
    background: #0f2027;
    color: #fff;
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

/* ===== الأزرار ===== */
.btn {
    border-radius: 12px;
    font-weight: 500;
}

/* ===== زر Create ===== */
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

/* ===== ترتيب عمودين للشاشات الكبيرة ===== */
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
footer,
.main-footer,
.footer {
    background: linear-gradient(135deg, #0f2027, #203a43, #2c5364) !important;
    color: #cfe9ff !important;
    border-top: 1px solid rgba(255,255,255,0.12) !important;
    box-shadow: 0 -10px 25px rgba(0,0,0,0.5) !important;
}

/* ===== إزالة أي لون أبيض من داخل الفوتر بالقوة ===== */
footer *,
.main-footer *,
.footer * {
    background: transparent !important;
    color: #cfe9ff !important;
}

/* ===== روابط الفوتر ===== */
footer a,
.main-footer a,
.footer a {
    color: #9ee7ff !important;
    text-decoration: none;
}

footer a:hover,
.main-footer a:hover,
.footer a:hover {
    color: #00c6ff !important;
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
        <label for="titleField">Title</label>
        <input type="text" name="title" class="form-control" id="titleField" placeholder="Enter report title" maxlength="150" value="{{ old('title', $report->title) }}">
    </div>

    <div class="form-group">
        <label for="typeField">Type</label>
        <input type="text" name="type" class="form-control" id="typeField" placeholder="Enter report type" maxlength="50" value="{{ old('type', $report->type) }}">
    </div>

    <div class="form-group">
        <label for="creatorField">Created By</label>
        <select name="created_by" class="form-control" id="creatorField">
            <option value="">Select user</option>
            @foreach($users as $user)
                <option value="{{ $user->id }}" {{ old('created_by', $report->created_by) == $user->id ? 'selected' : '' }}>
                    {{ $user->name }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="employeeField">Employee</label>
        <select name="employee_id" class="form-control" id="employeeField">
            <option value="">Select employee</option>
            @foreach($employees as $emp)
                <option value="{{ $emp->id }}" {{ old('employee_id', $report->employee_id) == $emp->id ? 'selected' : '' }}>
                    {{ $emp->first_name }} {{ $emp->last_name }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="departmentField">Department</label>
        <select name="department_id" class="form-control" id="departmentField">
            <option value="">Select department</option>
            @foreach($departments as $dept)
                <option value="{{ $dept->id }}" {{ old('department_id', $report->department_id) == $dept->id ? 'selected' : '' }}>
                    {{ $dept->name }}
                </option>
            @endforeach
        </select>
    </div>

    <!-- ===== تاريخ التقرير في نفس السطر ===== -->
    <div class="date-row">
        <div class="form-group">
            <label for="reportStartField">Report Period Start</label>
            <input type="date" name="report_period_start" class="form-control" id="reportStartField" value="{{ old('report_period_start', $report->report_period_start ? $report->report_period_start->format('Y-m-d') : '') }}">
        </div>

        <div class="form-group">
            <label for="reportEndField">Report Period End</label>
            <input type="date" name="report_period_end" class="form-control" id="reportEndField" value="{{ old('report_period_end', $report->report_period_end ? $report->report_period_end->format('Y-m-d') : '') }}">
        </div>
    </div>

    <div class="form-group">
        <label for="contentField">Content</label>
        <textarea name="content" class="form-control" id="contentField" placeholder="Enter report content">{{ old('content', $report->content) }}</textarea>
    </div>
</div>
