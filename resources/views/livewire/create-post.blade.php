<div>
    <!-- Button -->
    <button wire:click="$toggle('showForm')">
        Create Post
    </button>

    <!-- Create Form -->
    @if($showForm)
        <div style="margin-top: 10px;">
            <textarea wire:model="content" placeholder="What's on your mind?"></textarea>

            @error('content') <p>{{ $message }}</p> @enderror

            <button wire:click="save">
                Post
            </button>

            <button wire:click="$set('showForm', false)">
                Cancel
            </button>
        </div>
    @endif

    <hr>

    <!-- Posts List -->
    @foreach($posts as $post)
        <div>
            <strong>{{ $post->user->name }}</strong>
            <p>{{ $post->content }}</p>
        </div>
    @endforeach
</div>