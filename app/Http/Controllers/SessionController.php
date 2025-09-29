<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionController extends Controller
{
    
    public function create()
    {
        return inertia('Auth/Login');
    }

    
    public function store(Request $request)
    {
        //
    }

   
    public function destroy(string $id)
    {
        //
    }
}
