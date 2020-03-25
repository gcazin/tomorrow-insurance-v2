@php
    use App\Article;
    use Laravelista\Comments\Comment;

    $articles = Article::all();
     $comment = Comment::where('commentable_id', $article->id)->get();
     $comments_count = $comment->count();
@endphp

<div class="lg:flex mb-6 lg:mr-4 dark:shadow-2xl relative justify-end">
    <div class="lg:w-full leading-normal bg-white">
        <div class="lg:max-w-sm rounded overflow-hidden shadow-lg">
            <img class="w-full" src="{{ $article->image }}" alt="Sunset in the mountains">
            <div class="px-6 py-4">
                <div class="font-bold text-xl mb-2 truncate"><a href="{{ route('article.show', [$article->id, $article->slug]) }}">{{ $article->title }}</a></div>
                <p class="text-gray-700 text-base truncate">
                    {{ $article->description }}
                </p>
            </div>
            <div class="px-6 py-4">
                @foreach($article->tags as $tags)
                    <a href="{{ route('search') }}?tags={{ strtolower($tags->name) }}" class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-1 border border-solid border-transparent transition-250 hover:bg-blue-100 hover:border hover:border-solid hover:border-blue-300">#{{strtolower($tags->name)}}</a>
                @endforeach
            </div>
        <!--
            @if(auth()->check())
            @if(\App\User::isAdmin())
                <a href="{{ route('article.edit', $article->id) }}" class="btn btn-outline-blue btn-sm mr-1">Modifier</a>
                    <form action="{{ route('article.destroy', $article->id)}}" method="post">
                        @csrf
                @method('DELETE')
                    <button class="btn btn-outline-red btn-sm" type="submit">Supprimer</button>
                </form>
@endif
        @endif
            -->
        </div>
    </div>
</div>
