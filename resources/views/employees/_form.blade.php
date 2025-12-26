@vite('resources/css/FrontEnd/Dashboard/employees/form.css')

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
