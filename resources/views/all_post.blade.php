@extends('welcome')
@section('content')
    <div class="jumbotron">
        <h1 class="display-4">All post</h1>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">

                    <a href="{{route('write.post')}}" class="btn btn-danger">Write Post</a>
                    <hr>
                    <table class="table table-bordered table-responsive">
                        <tr>
                            <th>SL</th>
                            <th>Category</th>
                            <th>Title</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                        @foreach($allPost as $cat):
                        <tr>
                            <td>{{$cat->id}}</td>
                            <td>{{$cat->name}}</td>
                            <td>{{$cat->title}}</td>
                            <td><img src="{{url($cat->image)}}" style="width: 40px;height: 40px;"> </td>

                            <td>
{{--                                <a href="{{url('edit/post/'.$cat->id)}}" class="btn badge-info">Edit</a>--}}
                                <a href="{{url('delete/post/'.$cat->id)}}" class="btn badge-danger">Delete</a>
                                <a href="{{URL::to('/view/post/'.$cat->id)}}" class="btn badge-info">View</a>

                            </td>


                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
