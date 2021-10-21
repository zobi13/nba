<html>
    <body>
        <div>
            <p>The user {{ $user->name }} has left a comment on your teams page: </p>

            <blockquote>
                {{$comment->content}}
            </blockquote>
        </div>
    </body>
</html>
