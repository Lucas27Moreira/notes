<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        //load users notes
        $id = session('user_id');
        if (!$id) {
            return redirect()->to('/login');
        }

        $user = User::find($id);
        $notes = $user ? $user->notes()->get()->toArray() : [];

        //return home page
        return view('home', ['notes' => $notes]);
    }
    public function newNote()
    {
            echo "I'm inside the new note page";
    }
}
