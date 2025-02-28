<div class="card">
    <div class="px-3 pt-4 pb-2">
    <form enctype="multipart/form-data" action="{{route('users.update', $user->id)}}" method="post">
        @csrf
        @method('PUT')
        <div class="d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center">
                <img style="width:150px" class="me-3 avatar-sm rounded-circle"
                    src="{{$user->getImageURL()}}" alt="{{ $user->name }}">
                <div>
                        <input type="text" name="name" class="form-control" value="{{ $user->name }}">
                        @error('name')
                            <span class="d-block text-danger fs-6 mt-2">{{ $message }}</span>
                        @enderror
                    <span class="fs-6 text-muted">{{ $user->email }}</span>
                </div>
            </div>
            <div>
                <a class="btn btn-sm btn-primary" href="{{route('users.show', $user->id)}}"> <i class="fa-solid fa-arrow-left"></i></a>
            </div>
        </div>
        <div class="mt-4">
            <input type="file" class="form-control" name="image" id="">
            @error('image')
                <span class="d-block text-danger fs-6 mt-2">{{ $message }}</span>
            @enderror
        </div>
        <div class="px-2 mt-4">
            <h5 class="fs-5"> About : </h5>
                <textarea class="form-control" name="bio" id="about" rows="3">{{ $user->bio }}</textarea>
                @error('bio')
                    <span class="d-block text-danger fs-6 mt-2">{{ $message }}</span>
                 @enderror
                <button type="submit" class="btn btn-primary btn-sm my-2"> Save </button>
            <div class="d-flex justify-content-start">
                <a href="#" class="fw-light nav-link fs-6 me-3"> <span class="fas fa-user me-1">
                    </span> 120 Followers </a>
                <a href="#" class="fw-light nav-link fs-6 me-3"> <span class="fas fa-brain me-1">
                    </span> {{$user->ideas->count()}} </a>
                <a href="#" class="fw-light nav-link fs-6"> <span class="fas fa-comment me-1">
                    </span> {{$user->comments->count()}} </a>
            </div>
        </div>
    </form>
    </div>
</div>
