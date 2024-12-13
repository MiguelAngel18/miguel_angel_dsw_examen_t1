<?php

namespace App\Http\Controllers;
use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function showMessages()
    {
        $messages = \App\Models\Message::all();
        return view('messages', ['messages' => $messages]);
    }

    public function createMessage()
    {
        return view("create");
    }

    public function saveMessage(Request $request)
    {
        $message = new Message();

        $validatedData = $request->validate([
            'text' => 'required|string',
            'img' => 'required|string',
        ]);

        $message -> text = $request -> get("text");

        $message -> save();

        return redirect()->route("create")->with('success','Mensaje creado correctamente.');
    }

    public function destroyMessage($id)
    {
        $message = Message::findOrFail($id);
        $message->delete();

        return redirect()->route('messages')->with('success', 'Mensaje eliminado correctamente.');
    }

    public function editMessage($id)
    {
        $message = Message::findOrFail($id); 
        return view('create', compact('message')); 
    }

    public function updateMessage(Request $request, $id)
    {
        $validated = $request->validate([
            'text' => 'required|string',
            'img' => 'required|string',
        ]);

        $Message = Message::findOrFail($id);
        $Message->update($validated);

        return redirect()->route('messages')->with('success', 'Mensaje actualizado correctamente');
    }
}
