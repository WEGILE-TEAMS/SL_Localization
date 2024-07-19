<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegistrationController extends Controller
{
    public function showRegistrationForm($lang)
    {
        app()->setLocale($lang);
        return view('register', ['lang' => $lang]);
    }

    public function register(Request $request, $lang)
    {
        app()->setLocale($lang);

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ], [
            'required' => __('validation.required'),
            'email' => __('validation.email'),
            'min' => __('validation.min.string'),
            'confirmed' => __('validation.confirmed'),
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('register', ['lang' => $lang])
            ->with('success', __('Registration successful'));
    }
}
