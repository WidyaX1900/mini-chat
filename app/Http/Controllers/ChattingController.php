<?php

namespace App\Http\Controllers;

use App\Models\Chatting;
use App\Http\Requests\StoreChattingRequest;
use App\Http\Requests\UpdateChattingRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ChattingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::select('id', 'name')
            ->where('id', '!=', Auth::id())
            ->get();

        return view('index', ['users' => $users]);
    }

    /**
     * Show the chat content.
     */
    public function show($id)
    {
        $user = User::select('id', 'name')
        ->where('id', $id)
        ->first();
        
        $data = [
            'user' => $user
        ];
        
        return view('chat.show', $data);
    }
}
