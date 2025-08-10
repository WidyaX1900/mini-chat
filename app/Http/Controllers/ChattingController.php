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
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreChattingRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Chatting $chatting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Chatting $chatting)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateChattingRequest $request, Chatting $chatting)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Chatting $chatting)
    {
        //
    }
}
