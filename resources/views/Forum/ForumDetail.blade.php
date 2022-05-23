<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ForumDetail</title>
</head>
<body>
    
<div class="row">
    <div class="col-md-8">
        @if(Session::has('sukes'))
            <p class="text-success">{{session('sukes')}}</p>
        @endif
    </div>
    <div class="card">
        
        <h4 class="card-reader"> {{ $ForumDetail->Title }}    </h4>
        <h4 class="card-reader"> {{ $ForumDetail->Aspirasi }}    </h4>
        <h4 class="card-reader"> {{ $ForumDetail->User_Id }}    </h4>

        <div class="card my-5">
            <h5 class="card-header">Add Comment</h5>
            <div class="card-body">
                <form method="post" action="{{url('save-comment/'.Str::slug($ForumDetail->Title).'/'.$ForumDetail->id)}}">
                @csrf
                <textarea name="comment" class="form-control"></textarea>
                <input type="submit" class="btn btn-dark mt-2" />
            </div>
        </div>

        
        {{-- <div class="card my-4">
            <h5 class="card-header">Comments <span class="badge badge-dark"></span></h5>
            <div class="card-body">
                @foreach($ForumDetailComment as $comment)
                @if($comment->Aspirasi_Komen)
                    
                    <blockquote class="blockquote">
                        <p class="mb-0">{{$comment->comment}}</p>
                        <footer class="blockquote-footer">{{$comment->user->name}}</footer>
                      </blockquote>
                      <hr/>
                        <hr/>
                    
                @endif
                @endforeach
            </div>
        </div> --}}
        

        </h4>
    </div>

</div>

</html>
