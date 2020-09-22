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
                             
                        </tr>

                        <tr>
                            <td>{{$cat->id}}</td>
                            <td>{{$cat->name}}</td>
                            <td>{{$cat->slug}}</td>



                        </tr>

                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
