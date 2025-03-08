<div class="card">
    <div class="px-3 pt-4 pb-2">
        <div class="d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center">
                <img style="width:150px" class="me-3 avatar-sm rounded-circle"
                    src="{{$user->getImageURL()}}" alt="{{ $user->name }}">
                <div>
                    <h3 class="card-title mb-0"><a href="#"> {{ $user->name }}
                        </a></h3>
                    <span class="fs-6 text-muted">{{ $user->email }}</span>
                </div>
            </div>
            <div>
                <a class="btn btn-sm btn-primary" href="{{route('users.edit', $user->id)}}"> <i class="fa-solid fa-pen-to-square"></i></a>
            </div>
        </div>
        <div class="px-2 mt-4">
            <h5 class="fs-5"> About : </h5>
            <figure class="text-center">
                <blockquote class="blockquote">
                  <p class="mb-0">{{$user->bio}}</p>
                </blockquote>
                <figcaption class="blockquote-footer">
                  <cite title="Source Title"> {{ $user->name }} </cite>
                </figcaption>
              </figure>
            <div class="d-flex justify-content-start">
                <a href="#" class="fw-light nav-link fs-6 me-3"> <span class="fas fa-user me-1">
                    </span> {{$user->followers()->count()}} Followers </a>
                <a href="#" class="fw-light nav-link fs-6 me-3"> <span class="fas fa-brain me-1">
                    </span> {{$user->ideas->count()}} </a>
                <a href="#" class="fw-light nav-link fs-6"> <span class="fas fa-comment me-1">
                    </span> {{$user->comments->count()}} </a>
            </div>
            @if ($user->id !== auth()->user()->id)
            @if (Auth::user()->follows($user))
            <form action="{{route('users.unfollow', $user)}}" method="post">
                @csrf
                <div class="mt-3">
                    <button type="submit" class="btn btn-danger btn-sm"> Unfollow </button>
                </div>
            </form>
            @else
            <form action="{{route('users.follow', $user)}}" method="post">
                @csrf
                <div class="mt-3">
                    <button type="submit" class="btn btn-primary btn-sm"> Follow </button>
                </div>
            </form>
            @endif
            @endif
        </div>
    </div>
</div>
