@extends('partials.include')
@section('content')
<div class="row justify-content-center">
    <div class="col-12 col-sm-8 col-md-6">
        <form class="form mt-5" action="{{route('register')}}" method="post">
            @csrf
            <h3 class="text-center">Register</h3>
            <div class="form-group">
                <label for="name">Name:</label><br>
                <input type="text" name="name" id="name" class="form-control">
                @error('name')
                        <span class="d-block  fs-6 mt-2">{{ $message }}</span>
                    @enderror
            </div>
            <div class="form-group">
                <label for="email">Email:</label><br>
                <input type="email" name="email" id="email" class="form-control">
                @error('email')
                        <span class="d-block  fs-6 mt-2">{{ $message }}</span>
                    @enderror
            </div>
            <div class="form-group mt-3">
                <label for="password">Password:</label><br>
                <input type="password" name="password" id="password" class="form-control">
            </div>
            @error('password')
                <span class="d-block  fs-6 mt-2">{{ $message }}</span>
            @enderror
            <div class="form-group mt-3">
                <label for="confirm-password">Confirm Password:</label><br>
                <input type="password" name="password_confirmation" id="confirm-password" class="form-control">
            </div>
            @error('password_confirmation')
                <span class="d-block  fs-6 mt-2">{{ $message }}</span>
            @enderror
            <div class="form-group">
                <label for="remember-me"></label><br>
                <input type="submit" name="submit" class="btn btn-dark btn-md" value="submit">
            </div>
            <div class="text-right mt-2">
                <a href="/login">Login here</a>
            </div>
        </form>
    </div>
</div>
@endsection
