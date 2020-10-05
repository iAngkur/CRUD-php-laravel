@extends('masterpage')

@section('title')
| All Students
@endsection

@section('content')
<div class="row">
    <div class="col-lg-8 col-md-10 mx-auto">
        <a href="{{route('student')}}" class="btn btn-success">Add Student</a>
    </div>
    
    <div class="mt-5 mx-auto">
        <h4 style="display: block; margin: 0 auto; width: fit-content;"><u>All Students Info</u></h4>
        <br>
    <table class="table table-responsive">
            
                <tr class=" bg-dark text-white">
                    <th scope="col">Student Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Action</th>
                </tr>
                @foreach ($student as $row)
                <tr>
                    <td>{{ $row->name }}</td>
                    <td>{{ $row->email }}</td>
                    <td>{{ $row->phone }}</td>
                    <td>
                        <a href="" class="btn btn-sm btn-info">Edit</a>
                        <a href="" class="btn btn-sm btn-danger">Delete</a>
                        <a href="" class="btn btn-sm btn-success">View</a>
                    </td>
                </tr>
                @endforeach
        </table>
   </div>
    
</div>
@endsection 