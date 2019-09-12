<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FilesController extends Controller
{
    public function store() 
    {
        $data = request()->validate([
            'title' => '',
            'url' => ['required', 'url'],
            'home' => 'integer'
        ]);

        $home = auth()->user()->homes()->whereId($data['home'])->first();

        unset($data['home']);
        $home->files()->create($data);

        return redirect('/home');
    }
}
