<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;

class MessageController extends Controller
{
    /**
    * Create a new controller instance.
    *
    * @return void
    */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $messages = Message::paginate(5);
        return view('messages.message', ['messages' => $messages]);
    }

    public function create()
    {
        return view('forms.message');
    }

    public function store(Request $request)
    {
        try{
            $this->validate($request, [
                'title' => 'required|between:5,200',
                'message' => 'required|max:255'
            ]);

            if(isset($request->id))
            {
                $message = Message::find($request->id);
            } else {
                $message = new Message();
            }
            $message->title = strip_tags($request->title);
            $message->message = strip_tags($request->message);

            $message->save();

        } catch(Exception $e) {
            echo $e-getMessage();
        }
        $messages = Message::paginate(5);
        return view('messages.message', ['messages' => $messages]);
    }
    public function update($id)
    {
        $message = Message::find($id);
        return view('forms.message', ['message' => $message]);
    }

    public function delete($id)
    {
        $message = Message::find($id);
        $message->delete();
        $messages = Message::paginate(5);
        return redirect()->route('message', ['messages' => $messages]);
    }
}
