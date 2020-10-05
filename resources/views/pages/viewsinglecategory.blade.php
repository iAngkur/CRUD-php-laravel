@extends('masterpage')

@section('title')
| Post
@endsection

@section('content')
<div>
    <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
            <a href="{{route('add.category')}}" class="btn btn-success">Add Category</a>
            <a href="{{route('all.category')}}" class="btn btn-primary">All Category</a>
            <hr>
            <div class="mt-4">
                <ol>
                    <li><span class="font-weight-bold">Category Id:</span> {{$category->id}}</li>
                    <li><span class="font-weight-bold">Category Name:</span> {{$category->name}}</li>
                    <li><span class="font-weight-bold">Category Slug:</span> {{$category->slug}}</li>
                </ol>
            </div>
        
        
        </div>

        <br>
    </div>
</div>
@endsection 