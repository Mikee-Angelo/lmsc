<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use App\Models\User;
use OwenIt\Auditing\Models\Audit;
use Carbon\Carbon; 

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create()
    {
        /**
         * Check if there is a registered user
         * If there is registered user therefore it will be redirected to
         * login page
         */
        $user = User::take(1)->first();

        if(is_null($user)) return redirect('/register');

        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        $data = [
            'auditable_id' => auth()->user()->id,
            'auditable_type' => "App\Models\User",
            'event'      => "logged in",
            'url'        => request()->fullUrl(),
            'ip_address' => request()->getClientIp(),
            'user_agent' => request()->userAgent(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'user_id' => auth()->user()->id,
        ];

        //create audit trail data
        Audit::create($data);

        return redirect()->intended(RouteServiceProvider::HOME);
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $data = [
            'auditable_id' => auth()->user()->id,
            'auditable_type' => "App\Models\User",
            'event'      => "logged out",
            'url'        => request()->fullUrl(),
            'ip_address' => request()->getClientIp(),
            'user_agent' => request()->userAgent(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'user_id' => auth()->user()->id,
        ];

        //create audit trail data
        Audit::create($data);

        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();
        

        return redirect('/');
    }
}
