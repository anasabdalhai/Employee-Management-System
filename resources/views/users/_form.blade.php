
@vite('resources/css/FrontEnd/Dashboard/task/form.css')
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
