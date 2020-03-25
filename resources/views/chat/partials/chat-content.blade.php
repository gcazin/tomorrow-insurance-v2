@php
$user = new \App\User();
$user_avatar = App\User::all()->find(@request()->route('id'));
@endphp

@foreach($messages as $message)
    @if($message->sender->id == auth()->user()->id)

        <!-- Expéditeur -->
        <div class="flex justify-end px-3" id="message-{{$message->id}}">
            <div class="bull px-2 py-3 w-8/12">
                <div class="flex relative">
                    <div class="w-11/12 bg-gray-200 rounded-lg mr-5 px-5 py-2">
                        <p>{{$message->message}}</p>
                        <div class="text-right">
                            <small class="text-sm text-gray-600">{{$message->humans_time}}</small>
                            <a href="#" class="talkDeleteMessage" data-message-id="{{$message->id}}" title="Delete Message"><i class="fa fa-close"></i></a>
                        </div>
                    </div>
                    <div class="w-1/12 self-center">
                        <img src="{{ $user::getAvatar($message->sender->id) }}" class="h-12 rounded-full mx-auto">
                    </div>
                    <div class="absolute h-0" style="width: 0;
    border-left: 10px solid transparent;
    border-right: 10px solid transparent;
    border-bottom: 15px solid #edf2f7;
    right: 57px;
    top: 50%;
    transform: translate(0,-50%) rotate(90deg);"></div>
                </div>
            </div>
        </div>
    @else

        <!-- Receuveur -->
        <div class="flex px-3" id="message-{{$message->id}}">
            <div class="bull px-2 py-3 w-8/12">
                <div class="flex relative">
                    <div class="w-1/12 self-center">
                        <img src="{{ $user::getAvatar($user_avatar) }}" class="h-12 rounded-full mx-auto">
                    </div>
                    <div class="w-11/12 bg-gray-100 rounded-lg ml-5 px-5 py-2">
                        <p>{{$message->message }}</p>
                        <div class="text-right">
                            <small class="text-sm text-gray-600">{{$message->humans_time}}</small>
                        </div>
                    </div>
                    <div class="absolute h-0" style="width: 0;
    border-left: 10px solid transparent;
    border-right: 10px solid transparent;
    border-bottom: 15px solid #f7fafc;
    left: 57px;
    top: 50%;
    transform: translate(0,-50%) rotate(-90deg);"></div>
                </div>
            </div>
        </div>


    @endif
@endforeach
