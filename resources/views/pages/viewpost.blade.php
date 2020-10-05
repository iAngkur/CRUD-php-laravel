@extends('masterpage')

@section('title')
| Post
@endsection

@section('content')
<div class="row">
    <div class="col-lg-8 col-md-10 mx-auto">
        <p style="font-size: 14px;">{{ $post->name }}</p>
        <h4>{{ $post->title }}</h4>
        <hr>
        
        <img src="{{ asset('/postImage/' . $post->image) }}" style="display:block; height:300px; width: 300px; margin:0 auto;">

        <p style="font-size: 18px;">{{ $post->details}}</p>
    </div>
</div>
@endsection 