<div>
    @auth
    <form action="{{ route('idea.comment.store', $idea->id) }}" method="post">
        @csrf
        <div class="mb-3">
            <textarea name="content" class="fs-6 form-control" rows="1"></textarea>
        </div>
        <div>
            <button type="submit" class="btn btn-primary btn-sm"> Post Comment </button>
        </div>
    </form>
    @endauth

    <hr>

    <div class="mt-3 p-2 comment-box" style="overflow-y: scroll; height: 150px">
        @forelse ($idea->comments as $comment)
            <div class="d-flex align-items-start mb-3">
                <img style="width:35px" class="me-2 avatar-sm rounded-circle"
                    src="{{$comment->user->getImageURL()}}"
                    alt="Luigi Avatar">
                <div class="w-100">
                    <div class="d-flex justify-content-between">
                        <h6 class="mb-0"><a href="{{route('users.show', $comment->user->id)}}">{{$comment->user->name}}</a></h6>
                        <small class="fs-6 fw-light text-muted"> {{ $comment->created_at->diffForHumans() }} </small>
                    </div>
                    <p class="fs-6 mt-1 fw-light">
                        {{ $comment->content }}
                    </p>
                </div>
            </div>
            @empty
            <div class="alert alert-info">
                Type comments here
            </div>
        @endforelse
    </div>
</div>
