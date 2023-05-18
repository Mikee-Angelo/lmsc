<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;
use App\Models\Penalty;
use Spatie\Permission\Models\Permission;
use OwenIt\Auditing\Models\Audit;
use Carbon\Carbon;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create()
    {
        /**
         * Check if there is a registered user
         * If there is registered user therefore it will be redirected to
         * login page
         */
        $user = User::take(1)->first();

        if(is_null($user)) return view('auth.register');

        return redirect('/login');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        try {
            DB::beginTransaction();
            
            $request->validate([
                'name' => ['required', 'string', 'max:255', 'alpha_dash'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class, 'regex:/(.*)@subicbaycolleges\.com/i'],
                'password' => ['required', 'confirmed', Rules\Password::defaults()],
            ]);

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
        
            $user->givePermissionTo(Permission::all());

            $user->assignRole('Super Admin'); 
            
            $penalties = [
                [
                    'name' => 'Overdue Penalty', 
                    'fee' => 2000,
                    'type' => 'FIXED',
                    'excludes_from' => 'FACULTY',
                    'created_by' => $user->id,
                ],
                [
                    'name' => 'Loss Book Penalty', 
                    'fee' => 0,
                    'type' => "VARIABLE",
                    'created_by' => $user->id,
                ],
            ];

            foreach($penalties as $penalty) { 

                
                $p = new Penalty($penalty);

                $p->save(); 
            }

            event(new Registered($user));

            Auth::login($user);

            $data = [
                'auditable_id' => auth()->user()->id,
                'auditable_type' => "App\Models\User",
                'event'      => "logged in",
                'url'        => request()->fullUrl(),
                'ip_address' => request()->getClientIp(),
                'user_agent' => request()->userAgent(),
                'created_at' => Carbon::now('Asia/Manila'),
                'updated_at' => Carbon::now('Asia/Manila'),
                'user_id' => auth()->user()->id,
            ];

            //create audit trail data
            Audit::create($data);

            DB::commit();

            return redirect(RouteServiceProvider::HOME);
        } catch (e) { 
            DB::rollback();
        }
    }
}
