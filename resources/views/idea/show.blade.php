@extends('partials.include')
@section('content')
<div class="row">
    @include('partials.side-nav')
    <div class="col-6">
        @include('shared.success-message')
        <hr>
        <div class="mt-3">
            @include('shared.card')
        </div>
    </div>
    <div class="col-3">
        @include('shared.search-bar')
        @include('shared.follow-box')
    </div>
</div>
@endsection
