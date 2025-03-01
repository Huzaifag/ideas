<div class="card">
    <div class="px-3 pt-4 pb-2">
        <div class="d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center">
                <img style="width:50px" class="me-2 avatar-sm rounded-circle"
                    src="{{$idea->user->getImageURL()}}" alt="Mario Avatar">
                <div>
                    <h5 class="card-title mb-0"><a href="{{route('users.show', $idea->user->id)}}">{{ $idea->user->name }}
                        </a></h5>
                </div>
            </div>
            <form action="{{route('ideas.destroy', $idea->id)}}" method="post">
                @csrf
                @method('DELETE')
                <a class="btn btn-sm btn-info" href="{{route('ideas.show', $idea->id)}}"> <i class="fa fa-eye"></i></a>
                @auth
                @if (auth()->user()->id === $idea->user_id)
                <a class="btn btn-sm btn-primary" href="{{route('ideas.edit', $idea->id)}}"> <i class="fa-solid fa-pen-to-square"></i></a>
                <button class="btn btn-sm btn-danger" onclick="
                        confirm('Are you sure?') || event.stopImmediatePropagation()
                    " type="submit">
                    <i class="fa-solid fa-trash"></i>
                </button>
                @endif
                @endauth
            </form>
        </div>
    </div>
    <div class="card-body">
        @if (isset($editing) ?? false)
        <div class="row">
            <form action="{{route('ideas.update', $idea->id)}}" method="post">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <textarea class="form-control" name="content" id="idea" rows="3">{{$idea->content}}</textarea>
                    @error('content')
                        <span class="d-block text-danger fs-6 mt-2">{{ $message }}</span>
                    @enderror
                </div>
                <div class="">
                    <button type="submit" class="btn btn-dark"> Update </button>
                </div>
            </form>
        </div>
        @else
        <p class="fs-6 fw-light text-muted">
            {{ $idea->content }}
        </p>
        @endif
        <div class="d-flex justify-content-between">
            <div>
                <a href="#" class="fw-light nav-link fs-6"> <span class="fas fa-heart me-1">
                    </span> {{ $idea->likes }} </a>
            </div>
            <div>
                <span class="fs-6 fw-light text-muted"> <span class="fas fa-clock"> </span>
                    3-5-2023 </span>
            </div>
        </div>
       @include('shared.comment-box')
    </div>
</div>
