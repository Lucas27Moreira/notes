<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function loginSubmit(Request $request)
    {
        // form validation
        $request->validate(
            //rules
            [
            'text_username' => 'required|email',
            'text_password' => 'required|min:6|max:16'
            ],
            // error messages
            [
            'text_username.required' => 'o username é obrigatório',
            'text_username.email' => 'o username deve ser um email válido',
            'text_password.required' => 'a senha é obrigatória',
            'text_password.min' => 'a senha deve ter pelo menos :min caracteres',
            'text_password.max' => 'a senha não pode ter mais de :max caracteres'
            ]
        );
       
        $username = $request->input('text_username');
        $password = $request->input('text_password');

       // test database connection
       try {
        DB::connection()->getPdo();
        echo "conection is ok";
       } catch (\PDOException $e) {
           echo "Database connection failed: " . $e->getMessage();
       }
    }

    public function logout()
    {
        echo "Logout page";
    }
}
