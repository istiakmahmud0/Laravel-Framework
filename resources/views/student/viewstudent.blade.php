@extends('welcome')
@section('content')
    <div class="jumbotron">
        <h1 class="display-4">All post</h1>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <a href="{{url('all/student')}}" class="btn btn-primary">All Student</a>

                    <hr>
                    <table class="table table-bordered table-responsive">
                        <tr>
                            <th>SL</th>
                            <th>Category Name</th>
                            <th>Alug</th>
                            <th>Action</th>
                        </tr>
                            <tr>
                                <td>{{$student->name}}</td>
                                <td>{{$student->phone}}</td>
                                <td>{{$student->email}}</td>
                            </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection


