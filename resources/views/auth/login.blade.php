<style>/* ============================= */
/* ===================================== */
/* ✅ الخلفية العامة لصفحات المصادقة */
/* ===================================== */
.auth-page,
.min-h-screen {
    min-height: 100vh;
    background: linear-gradient(135deg, #0f2027, #203a43, #2c5364);
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 20px;
}

/* ===================================== */
/* ✅ كرت تسجيل الدخول (Glass Effect) */
/* ===================================== */
.auth-card,
.w-full.sm\:max-w-md {
    position: relative;
    background: rgba(255, 255, 255, 0.06) !important;
    backdrop-filter: blur(14px);
    border-radius: 22px;
    border: 1px solid rgba(255,255,255,0.14);
    box-shadow: 0 15px 40px rgba(0,0,0,0.7);
    color: #fff;
    overflow: hidden;
    padding: 35px 32px;
    animation: fadeUp 0.7s ease forwards;
}

/* أنيميشن دخول */
@keyframes fadeUp {
    from {
        opacity: 0;
        transform: translateY(40px) scale(0.95);
    }
    to {
        opacity: 1;
        transform: translateY(0) scale(1);
    }
}

/* طبقة زجاج خفيفة */
.auth-card::before,
.w-full.sm\:max-w-md::before {
    content: "";
    position: absolute;
    inset: 0;
    background: linear-gradient(
        160deg,
        rgba(255,255,255,0.08),
        rgba(255,255,255,0.01)
    );
    pointer-events: none;
    border-radius: 22px;
}

/* ظل متحرك */
.auth-card:hover,
.w-full.sm\:max-w-md:hover {
    box-shadow: 0 18px 45px rgba(0, 114, 255, 0.35);
    transform: translateY(-2px);
}

/* ===================================== */
/* ✅ إخفاء شعار Laravel بالكامل */
/* ===================================== */
.login-logo,
.auth-card svg,
.auth-card img,
.w-full.sm\:max-w-md svg,
.w-full.sm\:max-w-md img {
    display: none !important;
}

/* ===================================== */
/* ✅ العناوين */
/* ===================================== */
.auth-card h2,
.w-full.sm\:max-w-md h2 {
    text-align: center;
    color: #00c6ff;
    font-weight: 700;
    margin-bottom: 25px;
    position: relative;
}

.auth-card h2::after,
.w-full.sm\:max-w-md h2::after {
    content: "";
    display: block;
    width: 60px;
    height: 3px;
    margin: 12px auto 0;
    background: linear-gradient(90deg, #00c6ff, #0072ff);
    border-radius: 10px;
}

/* ===================================== */
/* ✅ الحقول */
/* ===================================== */
.auth-card input,
.auth-card select,
.w-full.sm\:max-w-md input,
.w-full.sm\:max-w-md select {
    background: rgba(0, 0, 0, 0.4) !important;
    border: 1px solid rgba(255,255,255,0.18);
    color: #fff !important;
    border-radius: 14px;
    padding: 12px 16px;
    margin-bottom: 16px;
    transition: 0.3s ease;
}

.auth-card input::placeholder,
.w-full.sm\:max-w-md input::placeholder {
    color: #aaa;
}

/* فوكس */
.auth-card input:focus,
.w-full.sm\:max-w-md input:focus {
    border-color: #00c6ff;
    box-shadow: 0 0 12px rgba(0,198,255,0.45);
    outline: none;
}

/* ===================================== */
/* ✅ زر تسجيل الدخول */
/* ===================================== */
.auth-card button,
.w-full.sm\:max-w-md button {
    width: 100%;
    background: linear-gradient(90deg, #00c6ff, #0072ff) !important;
    border: none;
    color: white;
    padding: 12px;
    border-radius: 14px;
    font-weight: 600;
    box-shadow: 0 5px 15px rgba(0,114,255,0.45);
    transition: 0.25s ease-in-out;
    letter-spacing: 1px;
    text-transform: uppercase;
}

.auth-card button:hover,
.w-full.sm\:max-w-md button:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 22px rgba(0,114,255,0.7);
}

/* ===================================== */
/* ✅ الروابط (نسيت كلمة المرور – تسجيل جديد) */
/* ===================================== */
.auth-card a,
.w-full.sm\:max-w-md a {
    color: #00c6ff;
    transition: 0.3s;
}

.auth-card a:hover,
.w-full.sm\:max-w-md a:hover {
    color: #4dd2ff;
    text-decoration: none;
}

/* ===================================== */
/* ✅ رسائل الأخطاء */
/* ===================================== */
.auth-card .text-red-600,
.w-full.sm\:max-w-md .text-red-600 {
    background: rgba(255, 65, 65, 0.18);
    color: #ffb3b3;
    padding: 10px 14px;
    border-radius: 10px;
    font-size: 14px;
    margin-bottom: 12px;
}

/* ===================================== */
/* ✅ تحسين الموبايل */
/* ===================================== */
@media (max-width: 480px) {
    .auth-card,
    .w-full.sm\:max-w-md {
        padding: 28px 22px;
    }
}

</style>

<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
