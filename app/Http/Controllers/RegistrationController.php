<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    public function create()
    {
        return inertia('Auth/Register');
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
