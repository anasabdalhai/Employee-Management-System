<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use App\Models\Employee;
use App\Models\Member;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(Request $request): RedirectResponse
    {
        // تحقق من صحة الحقول
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        // تحقق إذا المستخدم موجود في جدول member
        $member = Member::where('email', $credentials['email'])->first();
        if (!$member) {
            return back()->withErrors([
                'email' => 'هذا الحساب غير مسجل في النظام.',
            ]);
        }

        // تحقق إذا الموظف مرتبط بالمستخدم موجود في جدول employees
        $employee = $member->employee; // باستخدام العلاقة
        if (!$employee) {
            return back()->withErrors([
                'email' => 'أنت غير مسجل كموظف.',
            ]);
        }

        // محاولة تسجيل الدخول
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended(route('dashboard'));
        }

        // إذا كلمة السر غير صحيحة
        return back()->withErrors([
            'email' => 'بيانات الدخول غير صحيحة.',
        ]);
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
