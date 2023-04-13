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
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
                'password' => ['required', 'confirmed', Rules\Password::defaults()],
            ]);

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            $user->assignRole('Admin'); 
            

            $penalties = [
                [
                    'name' => 'Overdue Penalty', 
                    'fee' => 0,
                    'created_by' => $user->id,
                ],
                [
                    'name' => 'Unreturned Penalty', 
                    'fee' => 0,
                    'created_by' => $user->id,
                ],
            ];

            foreach($penalties as $penalty) { 
                $p = new Penalty($penalty);
                $p->save(); 
            }

            event(new Registered($user));

            Auth::login($user);

            DB::commit();

            return redirect(RouteServiceProvider::HOME);
        } catch (e) { 
            DB::rollback();
        }
    }
}
