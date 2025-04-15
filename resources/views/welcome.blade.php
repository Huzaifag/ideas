@extends('partials.include')
@section('title', 'Home')
@section('content')
<div class="row">
    <div class="col-3">
        @include('partials.side-nav')
    </div>
    <div class="col-6">
        @include('shared.success-message')
        @include('shared.form')
        <hr>
        @if (count($ideas) > 0)
        @foreach ($ideas as $idea )
        <div class="mt-3">
            @include('shared.card')
        </div>
        @endforeach
        @else
        <div class="alert alert-info">
            No ideas found
        </div>
        @endif
        <div class="mt-2">
            {{ $ideas->withQueryString()->links() }}
        </div>
    </div>
    <div class="col-3">
        @include('shared.search-bar')
        @include('shared.follow-box')
    </div>
</div>
@endsection
