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

}

/* ===== العناوين ===== */
.card-body label {
    color: #ddd;
    font-weight: 600;
    margin-bottom: 6px;
}

/* ===== الحقول النصية و textarea ===== */
.card-body .form-control {
    background: rgba(0, 0, 0, 0.35);
    border: 1px solid rgba(255,255,255,0.15);
    color: #fff;
    border-radius: 14px;
    padding: 5px 14px;
    transition: 0.3s ease-in-out;
    width: 100%;
    resize: vertical; /* يسمح بتغيير حجم textarea */
}

.card-body .form-control::placeholder {
    color: #aaa;
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
    background: #141e30;   /* داكن */
    color: #fff;
}

/* المسافات بين الحقول */
.card-body .form-group {
    margin-bottom: 18px;
}

/* ===== زر الإرسال في card-footer ===== */
.card-footer {
    background: rgba(255, 255, 255, 0.02);
    padding: 20px 25px;
    text-align: right;
    border-top: 1px solid rgba(255,255,255,0.1);
}

.card-footer .btn {
    background: linear-gradient(90deg, #00c6ff, #0072ff);
    border: none;
    color: white;
    padding: 10px 22px;
    border-radius: 14px;
    font-weight: 600;
    box-shadow: 0 5px 15px rgba(0,114,255,0.45);
    transition: 0.25s ease-in-out;
}

.card-footer .btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 22px rgba(0,114,255,0.7);
}

/* ===== تنبيهات الأخطاء ===== */
.alert-danger {
    background: rgba(255, 65, 65, 0.2);
    color: #ffb3b3;
    border: 1px solid rgba(255, 65, 65, 0.4);
    border-radius: 14px;
    box-shadow: 0 6px 18px rgba(0,0,0,0.4);
}

/* تنبيهات النجاح */
.alert-success {
    background: rgba(0, 255, 140, 0.2);
    color: #00ff8c;
    border: 1px solid rgba(0, 255, 140, 0.4);
    border-radius: 14px;
    box-shadow: 0 6px 18px rgba(0,0,0,0.4);
}

/* زر الإغلاق داخل التنبيه */
.btn-close {
    filter: invert(1);
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