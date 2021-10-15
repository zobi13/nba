@extends('layouts.app')

@section('title', 'Player')

@section('content')
    <h1>{{ $player->first_name }} {{ $player->last_name }}</h1>
    <p> {{ $player->email }} </p>
    <p> <a href="{{ route('team', ['team' => $player->team->id ]) }}"> {{ $player->team->name }} </a> </p>
@endsection
