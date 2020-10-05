@extends('masterpage')

@section('title')
| Post
@endsection

@section('content')
<div class="row">
    <div class="col-lg-8 col-md-10 mx-auto">

    <div class="mt-5 mx-auto">
        <table class="table table-responsive">
                <tr class="bg-warning text-secondary">
                    <th>SL.</th>
                    <th>Category</th>
                    <th>Title</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
                    <?php $i = 1; ?>
                    @foreach ($post as $row)
                    <tr>
                        <td><?php echo $i++; ?>.</td>
                        <td>{{ $row-> name}}</td>
                        <td class="font-weight-bold">{{ $row->title }}</td>
                        <td><img src="{{ asset('postImage/' . $row->image) }}" style="height:60px; width: 70px;"></td>
                        <td>
                            <a href="" class="btn btn-sm btn-info">Edit</a>
                            <a href="" class="btn btn-sm btn-danger">Delete</a>
                            <a href="{{ URL::to('view/post/' . $row->id) }}" class="btn btn-sm btn-success">View</a>
                        </td>
                    </tr>
                    @endforeach
            </table>
        </div>
    </div>
</div>
@endsection 