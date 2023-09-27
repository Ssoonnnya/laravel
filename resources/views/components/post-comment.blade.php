<article class="flex bg-gray-100  space-x-4">
    <x-panel>
    <div class="flex-shrink-0">
        <img src="https://i.pravatar.cc/60?id={{ $comment->id }}" alt="" width="60" height="60" class="rounded-xl">
    </div>

    <div>
        <header class="mb-4">
            <h3 class="font-bold" {{ $comment->author->username }}>John Doe</h3>

            <p class="text-xs">
                Posted
                <time>{{ $comment->created_at}}</time>
            </p>
        </header>

            {{ $comment->body}}

        </div>
    </x-panel>
</article>
