@extends('partials.include')
@section('content')
<div class="row">
    <div class="col-3">
        @include('partials.side-nav')
    </div>
    <div class="col-6">
        @include('shared.success-message')
        @include('shared.form')
        <hr>
        @foreach ($ideas as $idea )
        <div class="mt-3">
            @include('shared.card')
        </div>
        @endforeach
        <div class="mt-2">
            {{ $ideas->links() }}
        </div>
    </div>
    <div class="col-3">
        @include('shared.search-bar')
        @include('shared.follow-box')
    </div>
</div>
@endsection
