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

    <h5>
        Comments
    </h5>
    @forelse($team->comments as $comment)
        <div> {{ $comment->content }} </div>
        <div>
            By: {{ $comment->user->name }}
        </div>
        <hr>
    @empty
        <span> No comments </span>
    @endforelse

    <form action="{{ route('createComment', ['team'=>$team->id]) }}" method='POST'>
        @csrf
        <div class="form-group">
            <label for="content">Add comment:</label>
            <textarea name="content" id="content" cols="30" rows="10" class="form-control"></textarea>
            @error('content')
                <div class="alert alert-danger"> {{$message}} </div>
            @enderror
        </div>
        <button class="btn btn-primary"> Submit </button>
    </form>
    
    


@endsection