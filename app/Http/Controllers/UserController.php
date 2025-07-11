<?php

namespace App\Http\Controllers;

use App\Models\USer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function login(){
        return view('components.login');
    }

    public function loginUser(Request $request){
        $credentials = $request->validate([
            'username' => 'required|string|max:6',
            'password' => 'required|string'
        ]);

        if(Auth::attempt(['username' => $credentials['username'], 'password' => $credentials['password']])){
            $request->session()->regenerate();
            return redirect()->intended('/')->with('success', 'Login Successful');
        }
        return back()->withErrors([
            'username' => "Le credenziali fornite non sono corrette",
        ])->onlyInput('username');
    }

    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/')->with('success','Logout effettuato con successo');
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(USer $uSer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(USer $uSer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, USer $uSer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(USer $uSer)
    {
        //
    }
}
