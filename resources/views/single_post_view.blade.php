@extends('welcome')
@section('content')
    <div class="jumbotron">
        <h1 class="display-4">All post</h1>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">

                    <a href="{{route('write.post')}}" class="btn btn-danger">Write Post</a>
                    <a href="{{route('all.post')}}" class="btn btn-danger">ALL Post</a>
                    <hr>
                    <table class="table table-bordered table-responsive">
                        <tr>
                            <th>SL</th>
                            <th>Category</th>
                            <th>Title</th>
                            <th>Details</th>
                            <th>Image</th>

                        </tr>
                        <tr>
                            <td>{{$single_post->id}}</td>
                            <td>{{$single_post->name}}</td>
                            <td>{{$single_post->title}}</td>
                            <td>{{$single_post->details}}</td>
                            <td><img src="{{URL::to($single_post->image)}}" style="width: 140px;height: 140px;"> </td>
                        </tr>

                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
