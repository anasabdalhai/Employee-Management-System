
@vite('resources/css/FrontEnd/Dashboard/role/form.css')
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
    <label for="nameField">Role Name</label>
    <input type="text" 
           name="name" 
           class="form-control" 
           id="nameField"
           placeholder="Enter role name"
           maxlength="50"
           value="{{ old('name', $role->name) }}">
</div>

<fieldset>
    <legend>Abilities</legend>
    <table class="table table-bordered">
        <thead>
            <th>Ability</th>
            <th>allow</th>
            <th>Dany</th>
            <th>Inherit</th>
        </thead>
        <tbody>
            @foreach (config('abilites') as $ability_code => $ability_name)
            <tr>
          <td>{{ $ability_name }}</td>

<td>
    <input type="radio" name="abilities[{{ $ability_code }}]" value="allow"
        {{ old("abilities.$ability_code", $roles_abilities[$ability_code] ?? '') == 'allow' ? 'checked' : '' }}>
</td>

<td>
    <input type="radio" name="abilities[{{ $ability_code }}]" value="deny"
        {{ old("abilities.$ability_code", $roles_abilities[$ability_code] ?? '') == 'deny' ? 'checked' : '' }}>
</td>

<td>
    <input type="radio" name="abilities[{{ $ability_code }}]" value="inherit"
        {{ old("abilities.$ability_code", $roles_abilities[$ability_code] ?? '') == 'inherit' ? 'checked' : '' }}>
</td>

        </tr>
                
            @endforeach
        </tbody>

    </table>
    
</fieldset>
{{-- <div class="form-group">
    <label for="descField">Description</label>
    {{-- <textarea name="description" 
              class="form-control" 
              id="descField"
              placeholder="Enter description">{{ old('description', $role->description) }}</textarea> --}}
{{-- </div> --}}

</div>
