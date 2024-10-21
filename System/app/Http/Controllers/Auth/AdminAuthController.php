<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminAuthController extends Controller
{
    public function showAdminRegisterForm()
    {
        return view('admin.auth.adminregister');
    }

    public function registerAdmin(Request $request)
    {
        // Create a validator manually
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Check if validation fails
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Create new admin user
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'admin', // Set the role explicitly to 'admin'
        ]);

        // Redirect or login the admin user
        return redirect()->route('login')->with('success', 'Admin registered successfully.');
    }
}
