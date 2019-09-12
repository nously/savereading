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
        return view('homes.show', compact('home'));
    }

    public function update($home)
    {
        $data = request()->validate([
            'background' => 'image', 
            'item_color' => 'string', 
            'name' => 'string',
            'caption' => 'string',
        ]);
        
        auth()->user()->homes()->update($data);
        return;
    }

    public function store()
    {
        $data = request()->validate([
            'background' => 'image',
            'name' => ['required', 'string'],
            'caption' => ['required', 'string'],
            'item_color' => 'string',
        ]);
        // dd($data);

        $backgroundPath = (isset($data['background']))? $data['background']->store('backgrounds', 'public'): '';

        $home = auth()->user()->homes()->create(array_merge(
            $data,
            ['background' => $backgroundPath]
        ));
        $user = auth()->user();
        $homes = $user->homes();

        return view('homes.show', compact('homes'));
    }
}
