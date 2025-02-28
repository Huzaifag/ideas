@extends('partials.include')
@section('content')
<div class="row">
    <div class="col-3">
        @include('partials.side-nav')
    </div>
    <div class="col-6">
        @include('shared.success-message')
        <hr>
        <div class="mt-3">
            @include('shared.user-profile')
        </div>
        @if (count($user->ideas) > 0)
        @foreach ($user->ideas as $idea )
        <div class="mt-3">
            @include('shared.card')
        </div>
        @endforeach
        @else
        <div class="alert alert-info">
            No ideas found
        </div>
        @endif
    </div>
    <div class="col-3">
        @include('shared.search-bar')
        @include('shared.follow-box')
    </div>
</div>
@endsection
