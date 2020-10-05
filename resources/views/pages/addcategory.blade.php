@extends('masterpage')

@section('title')
| Post
@endsection

@section('content')
<div class="row">
    <div class="col-lg-8 col-md-10 mx-auto">
        <a href="{{route('add.category')}}" class="btn btn-success">Add Category</a>
        <a href="{{route('all.category')}}" class="btn btn-primary">All Category</a>

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
    <form action="{{ route('store.category') }}" method="post">
        @csrf
        <div class="control-group">
        <div class="form-group floating-label-form-group controls">
            <label>Category Name</label>
            <input type="text" class="form-control" placeholder="Category Name" name="name" id="name">
        </div>
        </div>

        <div class="control-group">
        <div class="form-group col-xs-12 floating-label-form-group controls">
            <label>Slug</label>
            <input type="text" class="form-control" placeholder="Slug Name" name="slug" id="slug">
        </div>
        </div>
        <br>
        <button type="submit" class="btn btn-primary" id="categoryAdd">ADD</button>
    </form>
    </div>
</div>
@endsection 