<?php

namespace App\Http\Controllers\Admin\Message;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Message\UpdateRequest;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\DemoMail;

class AdminMessageController extends Controller
{
    public function index()
    {
        $messages = Message::where('status', '0')->get();

        return view('admin.message.index', compact('messages'));
    }

    public function edit(Message $message)
    {
        return view('admin.message.edit', compact('message'));
    }

    public function update(UpdateRequest $request, Message $message)
    {

        $data = $request->validated();


        $mailData = [
            'title' => 'Уважаемый (ая), ' . $message->username,
            'question' => 'Ответ на вопрос: ' . $message->text,
            'body' => $data['text'],
        ];

        Mail::to($message->email)->send(new DemoMail($mailData));

        $message->update(['status' => '1']);

        return redirect()->route('admin.message.index');
    }

    public function delete(Message $message)
    {
        $message->delete();
        return redirect()->route('admin.message.index');
    }
}
