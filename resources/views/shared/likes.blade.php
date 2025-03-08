@auth
@if (Auth::user()->hasLiked($idea))
<form method="POST" action="{{route('ideas.unlike', $idea->id)}}">
  @csrf
  <div>
    <button type="submit" class="fw-light nav-link fs-6"> <span class="fas fa-heart me-1">
        </span> {{ $idea->likes()->count() }}
    </button>
  </div>
</form>
@else
<form method="POST" action="{{route('ideas.like', $idea->id)}}">
  @csrf
  <div>
    <button type="submit" class="fw-light nav-link fs-6"> <span class="far fa-heart me-1">
        </span> {{ $idea->likes()->count() }}
    </button>
  </div>
</form>
@endif
@endauth
@guest
<div>
  <a href="{{route('login')}}" class="fw-light nav-link fs-6"> <span class="far fa-heart me-1">
      </span> {{ $idea->likes()->count() }}
  </a>
</div>
@endguest