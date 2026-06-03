<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Note;
use App\Models\User;
use App\Services\Operations;
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
        // show new note page
        return view('new_Note');
    }

    public function newNoteSubmit(Request $request)
    {
        // validate request
        // form validation
        $request->validate(
            //rules
            [
                'text_title' => 'required|min:3|max:200',
                'text_note' => 'required|min:3|max:3000'
            ],
            // error messages
            [
                'text_title.required' => 'o título é obrigatório',
                'text_title.min' => 'o título deve ter pelo menos :min caracteres',
                'text_title.max' => 'o título não pode ter mais de :max caracteres',

                'text_note.required' => 'A nota é obrigatória',
                'text_note.min' => 'A nota deve ter pelo menos :min caracteres',
                'text_note.max' => 'A nota deve ter no máximo :max caracteres'
            ]
        );
        // get user id
        $id = session('user_id');
        
        // create new note
        $note = new Note();
        $note->user_id = $id;
        $note->title = $request->text_title;
        $note->content = $request->text_note;

        $note->save();

        // redirect to home page
        return redirect()->route('home');
    }

    public function editNote($id)
    {
        $id = Operations::decryptId($id);

        // load note
        $note = Note::find($id);

        // show edit note page
        return view('edit_Note', ['note' => $note]);
    }

    public function editNoteSubmit(Request $request)
    {
        // validate request
        // form validation
        $request->validate(
            //rules
            [
                'text_title' => 'required|min:3|max:200',
                'text_note' => 'required|min:3|max:3000'
            ],
            // error messages
            [
                'text_title.required' => 'o título é obrigatório',
                'text_title.min' => 'o título deve ter pelo menos :min caracteres',
                'text_title.max' => 'o título não pode ter mais de :max caracteres',

                'text_note.required' => 'A nota é obrigatória',
                'text_note.min' => 'A nota deve ter pelo menos :min caracteres',
                'text_note.max' => 'A nota deve ter no máximo :max caracteres'
            ]
        );

       if(!$request->note_id == null){
        return redirect()->route('home');
       }
            $id = Operations::decryptId($request->note_id);
            // load note
            $note = Note::find($id);

            // update note
            $note->title = $request->text_title;
            $note->content = $request->text_note;

            $note->save();
        // redirect to home page
        return redirect()->route('home');
    
    }

    public function deleteNote($id)
    {
        $id = Operations::decryptId($id);
        echo "I'm inside the delete note page with id: $id";
    }
}
