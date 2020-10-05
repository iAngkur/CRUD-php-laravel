@extends('masterpage')

@section('title')
| Create
@endsection

@section('content')
<div class="row">
    <div class="col-lg-8 col-md-10 mx-auto">
        <a href="{{ route('all.students') }}" class="btn btn-info btn-xs" role="button">All Students</a>

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
    
    <h4 style="display: block; margin: 0 auto; width: fit-content;" class="text-danger"><u>Insert New Student</u></h4>
    
    <form action="{{ route('store.student') }}" method="post">
        @csrf
        <div class="control-group">
        <div class="form-group floating-label-form-group controls">
            <label>Student Name</label>
            <input type="text" class="form-control" placeholder="Student Name" name="name">
        </div>
        </div>

        <div class="control-group">
        <div class="form-group col-xs-12 floating-label-form-group controls">
            <label>Student Email</label>
            <input type="email" class="form-control" placeholder="Student Email" name="email">
        </div>
        </div>
        
        <div class="control-group">
        <div class="form-group col-xs-12 floating-label-form-group controls">
            <label>Student Phone</label>
            <input type="tel" class="form-control" placeholder="Student Phone" name="phone">
        </div>
        </div>
        <br>
        <button type="submit" class="btn btn-success" id="categoryAdd">ADD</button>
    </form>
    </div>
</div>
@endsection 