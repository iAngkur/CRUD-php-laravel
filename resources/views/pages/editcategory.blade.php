@extends('masterpage')

@section('title')
| Post
@endsection

@section('content')
<div class="row">
    <div class="col-lg-8 col-md-10 mx-auto">
        <a href="{{route('add.category')}}" class="btn btn-success">Add Category</a>
        <a href="{{route('all.category')}}" class="btn btn-primary">All Category</a>

    <form action="{{ url('update/category/'.$category->id) }}" method="get" name="sentMessage" id="contactForm" novalidate>
        @csrf
        <div class="control-group mt-3">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>

        <div class="control-group">
        <div class="form-group floating-label-form-group controls">
            <label>Category Name</label>
            <input type="text" class="form-control" value="{{ $category->name }}" name="name" id="name">
        </div>
        </div>

        <div class="control-group">
        <div class="form-group col-xs-12 floating-label-form-group controls">
            <label>Slug</label>
            <input type="text" class="form-control" value="{{ $category->slug }}" name="slug" id="slug">
        </div>
        </div>
        <br>
        <button type="submit" class="btn btn-primary" id="categoryAdd">UPDATE</button>
    </form>
    </div>
</div>
@endsection 