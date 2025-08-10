<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    public function index()
    {
        $users = User::select('id', 'name')
        ->where('id', '!=', Auth::id())
        ->get();

        return view('index', ['users' => $users]);   
    }
}
