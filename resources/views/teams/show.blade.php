@extends('layouts.app')

@section('title', $team->name)

@section('content')
    <h2>
        {{ $team->name }}
    </h2>

    <p>
        {{ $team->address }}
    </p>
    <p>
        {{ $team->city }}
    </p>
    <p>
        {{ $team->email }}
    </p>
    <ul>
    @forelse($team->players as $player)
        <li> <a href="{{ route('player', ['player' => $player->id ]) }}"> {{ $player->first_name }} {{ $player->last_name }} </a> </li>
    @empty
    <span> No players have been added to this team </span>
    @endforelse
    </ul>
    
    


@endsection