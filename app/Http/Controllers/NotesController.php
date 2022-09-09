<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Note;

class NotesController extends Controller
{
    public function index()
    {
        $notes = Note::all();
        
        return view('home', [
            'notes' => $notes
        ]);
    }

    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {   
        $this->validate($request, [
            'title' => 'required|max:100',
            'text' => 'required|max:300',
        ], [
            'title.required' => 'Заполните поле!',
            'title.max' => 'Название не должно содержать больше 100 символов! У вас их ' . strlen($request->input('title')),
            'text.required' => 'Заполните поле!',
            'text.max' => 'Текст не должен содержать больше 300 символов! У вас их ' . strlen($request->input('text')),
        ]);

        Note::create([
            'title' => $request->input('title'),
            'text' => $request->input('text'),
        ]);

        return redirect()->route('index')->with('message', 'Заметка создана!');
    }

    public function destroy($id)
    {
        $note = Note::where('id', $id);
        $note->delete();

        return redirect()->route('index')->with('message', 'Заметка удалена!');
    }
}
