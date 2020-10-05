@extends('masterpage')

@section('title')
| Post
@endsection

@section('content')
<div class="row">
    <div class="col-lg-8 col-md-10 mx-auto">
        <div class="control-group">
            <a href="{{route('add.category')}}" class="btn btn-success">Add Category</a>
            <a href="{{route('all.category')}}" class="btn btn-primary">All Category</a>
        </div>
    
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

    <form action="{{ route('store.post') }}" method="post" enctype="multipart/form-data">
        @csrf

        <div class="control-group">
        <div class="form-group floating-label-form-group controls">
            <label>Title</label>
            <input type="text" class="form-control" placeholder="Title" name="title" id="title">
        </div>
        </div>
        
        <div class="control-group">
        <div class="form-group floating-label-form-group controls">
            <label>Category</label>
            <select name="category_id" class="form-control">
                @foreach($category as $row)
                    <option value="{{ $row->id }}">{{ $row->name }}</option>
                @endforeach 
            </select>
        </div>
        </div>

        <div class="control-group">
        <div class="form-group col-xs-12 floating-label-form-group controls">
            <label>Image</label>
            <input type="file" class="form-control" placeholder="Image" name="image">
        </div>
        </div>
        
        <div class="control-group">
        <div class="form-group floating-label-form-group controls">
            <label>Details</label>
            <textarea rows="5" class="form-control" placeholder="Details" name="details" id="details"></textarea>
        </div>
        </div>
        <br>
        <button type="submit" class="btn btn-primary" id="postSubmit">POST</button>
    </form>
    </div>
</div>
@endsection 