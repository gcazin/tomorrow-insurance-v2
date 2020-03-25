@extends('layouts.base', ['full_width' => true, 'title' => 'Conversations'])

@section('content')
    <div class="flex flex-row">

        <!-- Liste des personnes -->
        <div class="people-chat w-11/12 mx-auto lg:w-4/12 flex flex-col border-solid h-screen overflow-y-auto">
            @include('chat.partials.people-list')
        </div>

    </div>
@endsection
