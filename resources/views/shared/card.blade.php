<div class="card">
    <div class="px-3 pt-4 pb-2">
        <div class="d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center">
                <img style="width:50px" class="me-2 avatar-sm rounded-circle"
                    src="https://api.dicebear.com/6.x/fun-emoji/svg?seed=Mario" alt="Mario Avatar">
                <div>
                    <h5 class="card-title mb-0"><a href="#"> Mario
                        </a></h5>
                </div>
            </div>
            <form action="{{route('ideas.destroy', $idea->id)}}" method="post">
                @csrf
                @method('DELETE')
                <a class="btn btn-sm btn-info" href="{{route('ideas.show', $idea->id)}}"> <i class="fa fa-eye"></i></a>
                <a class="btn btn-sm btn-primary" href="{{route('ideas.edit', $idea->id)}}"> <i class="fa-solid fa-pen-to-square"></i></a>
                <button class="btn btn-sm btn-danger" onclick="
                        confirm('Are you sure?') || event.stopImmediatePropagation()
                    " type="submit">
                    <i class="fa-solid fa-trash"></i>
                </button>
            </form>
        </div>
    </div>
    <div class="card-body">
        @if ($editing ?? false)
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
        <div>
            <div class="mb-3">
                <textarea class="fs-6 form-control" rows="1"></textarea>
            </div>
            <div>
                <button class="btn btn-primary btn-sm"> Post Comment </button>
            </div>

            <hr>
            <div class="d-flex align-items-start">
                <img style="width:35px" class="me-2 avatar-sm rounded-circle"
                    src="https://api.dicebear.com/6.x/fun-emoji/svg?seed=Luigi"
                    alt="Luigi Avatar">
                <div class="w-100">
                    <div class="d-flex justify-content-between">
                        <h6 class="">Luigi
                        </h6>
                        <small class="fs-6 fw-light text-muted"> 3 hour
                            ago</small>
                    </div>
                    <p class="fs-6 mt-3 fw-light">
                        and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and
                        Evil)
                        by
                        Cicero, written in 45 BC. This book is a treatise on the theory of ethics,
                        very
                        popular during the Renaissan
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
