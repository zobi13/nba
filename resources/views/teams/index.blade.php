@extends('layouts.app')

@section('title', 'NBA')

@section('content')
    <h1>Teams</h1>
    <ul>
        @foreach($teams as $team)
            <li>
                <a href="{{ route('team', ['team' => $team->id ]) }}">
                    {{ $team->name }}
                    {{ $team->email }}
                    {{ $team->address }}
                    {{ $team->city }}
                </a>
            </li>
        @endforeach
    </ul>
@endsection

