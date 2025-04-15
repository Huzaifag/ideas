@auth
<h4 class="urdu my-4"> {{__('ideas.form_heading')}} </h4>
<div class="row">
    <form action="{{route('ideas.store')}}" method="post">
        @csrf
        <div class="mb-3">
            <textarea class="form-control" name="content" id="idea" rows="3"></textarea>
            @error('content')
                <span class="d-block text-danger fs-6 mt-2">{{ $message }}</span>
            @enderror
        </div>
        <div class="">
            <button type="submit" class="btn btn-dark"> Share </button>
        </div>
    </form>
</div>
@endauth

@guest
    <h4>Login to Share yours ideas </h4>
@endguest
