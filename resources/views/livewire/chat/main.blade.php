<div>
    <!-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Chat') }}
        </h2>
    </x-slot> -->
    {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}

    <div class="chat_container">

        <div class="chat_list_container">
            
            @livewire('chat.chat-list')
        </div>

        <div class="chat_box_container">

            @livewire('chat.chatbox')

            @livewire('chat.send-message')
        </div>
    </div>

</div>
