<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\CommentsRequest;
use App\Models\Team;
use App\Models\Comments;
use App\Mail\CommentReceived;
use Illuminate\Support\Facades\Mail;

class CommentsController extends Controller
{
    public function store(Team $team, CommentsRequest $request)
    {
        $data = $request->validated();

        $dataUserTeamRelation = [
            'team_id' => $team->id,
            'user_id' => auth()->user()->id
        ];
        
        // Comments::create(array_merge($data, $dataUserTeamRelation));
        $comment = $team->comments()->create(array_merge($data, $dataUserTeamRelation));
        
        Mail::to($team)->send(
            new CommentReceived($comment)
        );
        return back();
    }
}
