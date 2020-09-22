@extends('welcome')
@section('content')
    <div class="jumbotron">
        <h1 class="display-4">All post</h1>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">

                    <hr>
                    <table class="table table-bordered table-responsive">
                        <tr>
                            <th>SL</th>
                            <th>Category Name</th>
                            <th>Alug</th>
                            <th>Action</th>
                        </tr>
                         @foreach($student as $stu)
                            <tr>
                                <td>{{$stu->name}}</td>
                                <td>{{$stu->phone}}</td>
                                <td>{{$stu->email}}</td>
                                <td>
                                    <a href="{{url("edit/student"."/$stu->id")}}" class="btn badge-info">Edit</a>
                                    <a href="{{url('delete/student'."/$stu->id")}}" class="btn badge-danger">Delete</a>
                                    <a href="{{url('view/student'."/$stu->id")}}" class="btn badge-info">View</a>

                                </td>


                            </tr>
                        @endforeach

                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

