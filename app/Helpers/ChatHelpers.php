<?php
namespace App\Helpers;

use Illuminate\Support\Facades\DB;

class ChatHelpers
{
    public static function getMessages($sender_id, $receiver_id)
    {
        $messages = DB::table('chattings')
        ->select(['sender_id', 'message'])
        ->whereRaw('sender_id = ? AND receiver_id = ?', [$sender_id, $receiver_id])
        ->orWhereRaw('sender_id = ? AND receiver_id = ?', [$receiver_id, $sender_id])
        ->orderBy('id', 'desc')
        ->get();

        return $messages;
    }
}