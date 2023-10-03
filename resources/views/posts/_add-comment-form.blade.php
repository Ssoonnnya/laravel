@auth

<x-panel>


    <form mathod='POST' action='/posts/{{ $post->slug }}/comments'>
        @csrf

        <header clasws='flex items-center'>
            <img src="https://i.pravatar.cc/60?id={{ auth()->id() }}" alt="" width="60" height="60" class="rounded-xl">
            <h3 class='ml-4'>Want to participate?</h3>
        </header>

        <div class="mt-6">
            <textarea name='body'
                      class="w-full text-sm focus:outline:none focus-ring"
                      rows='5'
                      placeholder='Quick, thong of something to say!'
                      required>
            </textarea>

            @error('body')
                <span class="text-xs text-red-500">{{ $message }}</span>
            @enderror

        </div>

        <div class='flex justify-end mt-6 pt-6 border-t border-gray-200 pt-6'>
            <x-form.button>Post</x-form.button>
        </div>

    </form>

    @foreach ($post->comments as $comment)
        <x-post-comment :comment="$comment"/>
    @endforeach

</x-panel>

@else

<p class="font-semibold">
    <a class="hover:underline" href="/login">Log In to leave a comment!</a>
    <a class="hover:underline" href="/register">Register!</a>

</p>

@endauth

