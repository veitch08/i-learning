<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (auth()->user()->role->slug === 'admin') {
            $title = 'admin';
        }else if (auth()->user()->role->slug === 'guru') {
            $title = 'guru';
        }else {
            $title = 'siswa';
        }
        return view('home', compact('title'));
    }
}
