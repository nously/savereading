<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FilesController extends Controller
{
    public function store() 
    {
        $file = request()->validate([
            'title' => '',
            'url' => ['required', 'url'],
        ]);
        
        auth()->user()->files()->create($file);

        return redirect('/home');
    }
}
