<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function create()
    {
        return view('register.create');
    }
    
    public function store(Request $request)
    {
        $user = User::create(request(['name', 'full_name', 'email', 'password']));
        
        // auth()->login($user);
        
        return redirect()->to('/');
    }
}
