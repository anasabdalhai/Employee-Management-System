
@vite('resources/css/FrontEnd/Dashboard/report/form.css')
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
