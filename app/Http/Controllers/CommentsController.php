<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\\Models\Team;
use App\\Models\User;

use App\Http\Requests\CommentsRequest;

class CommentsController extends Controller
{
    public function store(Team $team, CommentsRequest $request)
    {
        $data = $request->validated();

        $dataUserTeamRelation = [
            'team_id' => $team->id,
            'user_id' => auth()->user()->id
        ];

        Comment::create(array_merge($data, $dataUserTeamRelation))
        // $team->comments()->create($data);

        return back();
    }
}
