<div class="comment-section">
    {{-- Button to fetch comments --}}

    {{-- Display comments --}}
    <div class="comments">
        @if ($comments != null)
            @foreach ($comments as $comment)
                <div class="card mb-3">
                    <div class="card-body">
                        <p class="card-text">{{ $comment->content }}</p>
                        <p class="card-subtitle text-muted">Posted by: {{ $comment->user->name }}</p>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
</div>
