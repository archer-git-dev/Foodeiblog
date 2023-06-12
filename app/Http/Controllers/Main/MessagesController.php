<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Http\Requests\Main\MessageRequest;
use App\Models\Message;
use Illuminate\Http\Request;

class MessagesController extends Controller
{
    public function store(MessageRequest $request) {

        $data = $request->validated();

        Message::create($data);

        return redirect()->back();

    }
}
