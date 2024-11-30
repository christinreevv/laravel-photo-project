<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('users.index');

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:25',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:3|max:15|confirmed', // Минимум 3 и максимум 15 символов
        ], [
            'password.min' => 'Пароль должен содержать как минимум 3 символа.',
            'password.max' => 'Пароль не может превышать 15 символов.',
        ]);
        // $name = $request->name;
        // $email = $request->email;
        // $password = Hash::make($request->password);
        // DB::insert(
        //     'insert into users (name, email, password) values (?, ?, ?)',
        //     [$name, $email, $password]
        // );

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']), // Хеширование пароля
        ]);
        return view('users.success', ['user' => $user]);
    }

    public function loginform(){
        return view('users.loginform');
    }

    public function login(Request $request){
        // dump($request->all());
        $credentials = $request->validate([
            'email'=> 'required|email',
            'password'=> 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('home');
        }

        return back()->withErrors([
            'email'=> 'Введеные данные не соответствуют',
        ]);
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('loginform');
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
