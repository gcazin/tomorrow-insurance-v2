@extends('layouts.base', ['full_width' => true])

@section('content')
    <!-- Chat  -->
    <div class="flex flex-col w-11/12 lg:w-8/12 bg-white">
        @if(request()->route('id') !== null)
            <div class="border-b border-solid border-gray-200 px-5 text-gray-600 items-center flex" style="height: 50px">
                Conversation avec {{ App\User::all()->find(@request()->route('id'))->name }}
            </div>
            <div class="conversation-chat py-5 relative overflow-y-auto" style="height: 525px" id="talkMessages">
                @include('chat.partials.chat-content')
            </div>

            <!-- Champ de saisie pour écrire un chat -->
            <div class="flex items-center">
                <form action="{{ route('ajax::chat.new') }}" method="post" id="talkSendMessage" class="w-full px-5 py-1 relative">
                    @csrf
                    <input type="hidden" name="_id" value="{{@request()->route('id')}}">
                    <input name="message-data" id="message-data" class="input" placeholder="Écrivez votre message" style="height: 70px">
                    <button type="submit" class="absolute mr-4 mt-3 text-blue-500 text-xl" style="top: 39%;right: 1%;transform: translate(-50%, -50%)">
                        <i class="far fa-paper-plane"></i>
                    </button>
                </form>
            </div>
        @else
            <div class="alert alert-info">
                <p>Aucune conversation selectionné</p>
            </div>
        @endif
    </div>

    <script>
        let __baseUrl = "{{ url('/') }}";
        let element = document.getElementById('talkMessages');
        element.scrollTop = element.scrollHeight
    </script>
    <script src='http://cdnjs.cloudflare.com/ajax/libs/handlebars.js/3.0.0/handlebars.min.js'></script>
    <script src='http://cdnjs.cloudflare.com/ajax/libs/list.js/1.1.1/list.min.js'></script>
    <script src="{{ asset('js/talk.js')}} "></script>
    <!-- Regler le soucis de synchro entre les pags -->
    <script>
        let show = function(data) {
            alert(data.sender.name + " - '" + data.message + "'");
        };
        let msgshow = function(data) {
            var html = '@include('chat.ajax.new-chat-javascript')';
            $('#talkMessages').append(html);
        };
    </script>
    {!! talk_live(['user'=>["id"=>auth()->user()->id, 'callback'=>['msgshow']]]) !!}
@endsection
