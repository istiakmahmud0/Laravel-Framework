@extends('welcome')
@section('content')
    <div class="jumbotron">
        <h1 class="display-4">All post</h1>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <a href="{{route('add.category')}}" class="btn btn-primary">Add Category</a>
                    <a href="{{route('all.category')}}" class="btn btn-danger">All Category</a>
                    <hr>
                    <table class="table table-bordered table-responsive">
                       <tr>
                           <th>SL</th>
                           <th>Category Name</th>
                           <th>Alug</th>
                           <th>Action</th>
                       </tr>
                        @foreach($category as $cat)
                        <tr>
                            <td>{{$cat->id}}</td>
                            <td>{{$cat->name}}</td>
                            <td>{{$cat->slug}}</td>
                            <td>
                                <a href="{{url('edit/category/'.$cat->id)}}" class="btn badge-info">Edit</a>
                                <a href="{{url('delete/category/'.$cat->id)}}" class="btn badge-danger">Delete</a>
                                <a href="{{URL::to('/view/category/'.$cat->id)}}" class="btn badge-info">View</a>

                            </td>


                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
