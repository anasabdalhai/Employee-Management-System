
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

/* ===== جسم الفورم (عمود واحد فقط) ===== */
.card-body {
    background: rgba(255, 255, 255, 0.04);
    border-radius: 18px;
    padding: 25px;
}

/* ===== العناوين ===== */
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
    padding: 10px 14px;
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

/* ===== زر الحفظ العصري ===== */
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
/* ===== توحيد لون الفوتر 100% مع خلفية الصفحة المتدرجة ===== */
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

/* ===== إزالة أي خلفية بيضاء من الجسم بالكامل (احتياطي) ===== */
html, body {
    background: linear-gradient(135deg, #0f2027, #203a43, #2c5364) !important;
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
