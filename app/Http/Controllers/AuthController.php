<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
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

        // check if user exists
        $user = User::where('username', $username)
            ->where('deleted_at', null)
            ->first();

            if (!$user) {
                return redirect()
                ->back()
                ->withInput()
                ->with(['loginError' => 'Usuário ou password incorretos']);
            }

            // check if password is correct
            if (!password_verify($password, $user->password)) {
                return redirect()
                ->back()
                ->withInput()
                ->with(['loginError' => 'Usuário ou password incorretos']);
            }

            // update last login
            $user->last_login = date('Y-m-d H:i:s');
            $user->save();

            // login user
            session([
                'user_id' => $user->id,
                'username' => $user->username,
            ]);


            echo "login com sucesso";


    }

    public function logout()
    {
        echo "Logout page";
    }
}
