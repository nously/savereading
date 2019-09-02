<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //retrieve files
        $user = auth()->user();
        $home = $user->homes()->first();
        return view('home', compact('user', 'home'));
    }

    public function update($home)
    {
        $data = request()->validate([
            'item_color' => ''
        ]);
        
        auth()->user()->homes()->update($data);
        return;
    }
}
