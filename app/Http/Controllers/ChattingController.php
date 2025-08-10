<?php

namespace App\Http\Controllers;

use App\Models\Chatting;
use App\Http\Requests\StoreChattingRequest;
use App\Http\Requests\UpdateChattingRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

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

    /**
     * Send the message.
     */
    public function send(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'receiver_id' => 'required',
            'message' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'form_error' => $validator->errors()
            ]);
        }
        
        $chatting = Chatting::create([
            'sender_id' => Auth::id(),
            'receiver_id' => $request->receiver_id,
            'message' => $request->message
        ]);

        if($chatting) {
            return response()->json([
                'status' => 'success'
            ]);
        }
    }
}
