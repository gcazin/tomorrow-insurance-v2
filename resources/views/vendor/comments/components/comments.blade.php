@auth
    @include('comments::_form')
@elseif(config('comments.guest_commenting') == true)
    @include('comments::_form', [
        'guest_commenting' => true
    ])
@else
    <div class="alert alert-info">
        <h5 class="mb-3">Vous devez être connecté pour poster un commentaire</h5>
        <a href="{{ route('register') }}" class="link">S'inscrire</a>
        ou
        <a href="{{ route('login') }}" class="link">Se connecter</a>
    </div>
@endauth

@php
    if (isset($approved) and $approved == true) {
        $comments = $model->approvedComments;
    } else {
        $comments = $model->comments;
    }
@endphp

@if($comments->count() < 1)
    <div class="alert alert-warning">Il n'y a pas encore de commentaire sous cet article.</div>
@endif

<ul class="list-unstyled">
    @php
        $grouped_comments = $comments->sortBy('created_at')->groupBy('child_id');
    @endphp
    @foreach($grouped_comments as $comment_id => $comments)
        {{-- Process parent nodes --}}
        @if($comment_id == '')
            @foreach($comments as $comment)
                @include('comments::_comment', [
                    'comment' => $comment,
                    'grouped_comments' => $grouped_comments
                ])
            @endforeach
        @endif
    @endforeach
</ul>
