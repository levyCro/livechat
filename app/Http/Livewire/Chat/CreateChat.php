<?php

namespace App\Http\Livewire\Chat;

use App\Models\Conversation;
use App\Models\Message;
use App\Models\User;
use Livewire\Component;

class CreateChat extends Component
{
    public $users;
    public $message= 'Hello how are you? ';

    public function checkconversation($receiverId)
    {
        $checkedConersation= Conversation::where('receiver_id',auth()->user()->id)->where('sender_id', $receiverId)->orWhere('receiver_id', $receiverId)->where('sender_id', auth()->user()->id)->get();

        if(count($checkedConersation)==0){
            //dd('no conversation');
            $createdConversation= Conversation::create(['receiver_id'=>$receiverId, 'sender_id'=>auth()->user()->id, 'last_time_message'=>0]);

            $createdMessage= Message::create(['conversation_id'=>$createdConversation->id, 'sender_id'=>auth()->user()->id, 'receiver_id'=>$receiverId, 'body'=>$this->message]);

            $createdConversation->last_time_message= $createdMessage->created_at;
            $createdConversation->save();
            dd($createdMessage);
            dd('saved');

        } else if(count($checkedConersation)>=1){
            dd('conversation exists');
        }
    }

    public function render()
    {
        $this->users= User::where('id', '!=', auth()->user()->id)->get();
        return view('livewire.chat.create-chat');
    }
}
