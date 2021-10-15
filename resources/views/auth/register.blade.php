@extends('layouts.app')

@section('title', 'Register')

@section('content')
    <form action="/register" method="POST">
        @csrf
        <div class="form-group mt-3">
            <label for="name"> Name: </label>
            <input type="text" id="name" name="name" class="form-control">
            @error('name')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group mt-3">
            <label for="name"> Email: </label>
            <input type="text" id="email" name="email" class="form-control">
            @error('email')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group mt-3">
            <label for="password"> Password: </label>
            <input type="password" id="password" name="password" class="form-control">
            @error('password')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group mt-3">
            <label for="password_confirmation"> Confirm password: </label>
            <input type="password" id="password_confirmation" name="password_confirmation" class="form-control">
            @error('password_confirmation')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <button class="btn btn-primary" type="submit"> Register </button>
    </form>
@endsection

