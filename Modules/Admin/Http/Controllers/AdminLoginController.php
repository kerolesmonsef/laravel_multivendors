<?php

namespace Modules\Admin\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Modules\Admin\Entities\Admin;

class AdminLoginController extends Controller
{
    public function getLogin()
    {
        return view("admin::login");
    }

    public function postLogin()
    {
        $this->validate(\request(), [
            'email' => "bail|required|string|email|exists:users,email",
            'password' => "required|string|min:6"
        ]);
        $credentials = request()->only(['email', 'password']);

        if (auth()->attempt($credentials)) {
            if (auth()->user()->profile_type == Admin::class) {
                return redirect()->intended(route('admin.dashboard'));
            }
        }
        return redirect()->back()->withErrors(['email' => "You Are Not Admin"]);
    }
}
