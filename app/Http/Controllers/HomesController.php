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
        return view('home', compact('user'));
    }

    public function update($home)
    {
        $data = request()->validate([
            'item_color' => ''
        ]);
        
        auth()->user()->home()->update($data);
        return;
    }
}
