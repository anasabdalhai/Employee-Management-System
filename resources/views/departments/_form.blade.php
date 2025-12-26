@vite('resources/css/FrontEnd/Dashboard/department/form.css')

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


    {{-- اسم القسم --}}
    <div class="form-group">
        <label for="deptName">Department Name</label>
        <input type="text" 
               name="name" 
               class="form-control" 
               id="deptName" 
               placeholder="Enter department name" 
               maxlength="100"
               value="{{ old('name', $department->name ?? '') }}">
    </div>

    {{-- مدير القسم --}}
    <div class="form-group">
        <label for="managerField">Manager ID</label>
        <input type="number" 
               name="manager_id" 
               class="form-control" 
               id="managerField" 
               placeholder="Enter manager ID"
               value="{{ old('manager_id', $department->manager_id ?? '') }}">
    </div>

    {{-- عرض created_at للقراءة فقط أثناء التعديل --}}
    @if(isset($department))
    <div class="form-group">
        <label>Created At</label>
        <input type="text" 
               class="form-control" 
               value="{{ $department->created_at }}" 
               readonly>
    </div>

    <div class="form-group">
        <label>Updated At</label>
        <input type="text" 
               class="form-control" 
               value="{{ $department->updated_at }}" 
               readonly>
    </div>
    @endif

</div>
