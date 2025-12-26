

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

  {{-- First Name --}}
 <form action="{{ route('tasks.store') }}" method="POST">
                @csrf

                {{-- حقول الإدخال --}}
                <div class="card-body">

                    {{-- Title --}}
                    <div class="form-group">
                        <label for="title">Task Title</label>
                        <input type="text" 
                               name="title" 
                               class="form-control" 
                               placeholder="Enter task title"
                               value="{{ old('title') }}">
                    </div>

                    {{-- Description --}}
                    <div class="form-group">
                        <label for="description">Task Description</label>
                        <textarea name="description" 
                                  class="form-control" 
                                  placeholder="Enter task description">{{ old('description') }}</textarea>
                    </div>

                    {{-- Employee --}}
                    <div class="form-group">
                        <label for="employee_id">Assigned Employee</label>
                        <select name="employee_id" class="form-control">
                            <option value="">- Select Employee -</option>
                            @foreach($employees as $employee)
                                <option value="{{ $employee->id }}">
                                    {{ $employee->first_name }} {{ $employee->last_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    {{-- Department --}}
                    <div class="form-group">
                        <label for="department_id">Department</label>
                        <select name="department_id" class="form-control">
                            <option value="">- Select Department -</option>
                            @foreach($departments as $department)
                                <option value="{{ $department->id }}">
                                    {{ $department->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    {{-- Status --}}
                    <div class="form-group">
                        <label for="status">Task Status</label>
                        <select name="status" class="form-control">
                            <option value="pending">Pending</option>
                            <option value="in_progress">In Progress</option>
                            <option value="completed">Completed</option>
                        </select>
                    </div>

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Create Task</button>
                </div>

             </form>