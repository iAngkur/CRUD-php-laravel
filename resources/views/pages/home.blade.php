@extends('masterpage')

@section('content')
<div class="row">
    <div class="col-lg-8 col-md-10 mx-auto">
        @foreach($post as $row)
            <div class="post-preview">
                <a href="{{ URL::to('view/post/' . $row->id) }}">
                    <img src="{{ asset('/postImage/' . $row->image) }}" style="width: 200px; height:200px;">
                    <h2 class="post-title">{{ $row->title }}</h2>
                </a>
                <p class="post-meta">
                    Category
                    <a href="#" class="text-primary">{{ $row->name }}</a>
                    on Slug {{ $row->slug }}
                </p>
            </div>
            <hr>
        @endforeach

        {{ $post->links() }}
    </div>
</div>
@endsection 