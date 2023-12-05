<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\MessageList;
use App\Models\Message_room_list;
use Illuminate\Support\Str;
use App\Events\MessageChat;


class MessageListController extends Controller
{


    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'receiver_id' => 'required', // Make sure to add the validation rule for room_code
        ]);
    
        $sender_id = $request->input('sender_id');
        $receiver_id = $request->input('receiver_id');


        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        // Create a new MessageList instance
        $messageList = new MessageList();
        $messageList->sender_id = $sender_id;
        $messageList->receiver_id = $receiver_id;
        $messageList->messag_text = $request->input('messag_text');
        $messageList->messag_file = $request->input('messag_file');

        
        if ($sender_id > $receiver_id) {
            $room_code = $sender_id . $receiver_id;
        } else {
            $room_code = $receiver_id . $sender_id;
        }

        $messageList->room_code =  $room_code;

        if (Message_room_list::where('room_pear', $room_code)->exists()) {
          
        }else{
            $list = new Message_room_list;
            $list->room_pear =  $room_code;
            $list->receiver_id =   $receiver_id;
            $list->sender_id =  $sender_id;
            $list->save();
        }

        $messageList->save();
        broadcast(new MessageChat($messageList));

$mgeList = Message_room_list::with('receiver')->with('sender')->get();



        return response()->json(['data' => $mgeList], 201);

    }
    


}
