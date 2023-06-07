<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;

class ContactController extends Controller
{
    public function index() {
        return view('main.contact');
    }
}
