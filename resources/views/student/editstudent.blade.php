@extends('welcome')
@section('content')
    <div class="jumbotron">
        <h1 class="display-4">Student</h1>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <h3>New Student Insert</h3>
                    <a href="{{route('all.student')}}" class="btn btn-danger">All Student</a>
                    <hr>
{{--                    @if ($errors->any())--}}
{{--                        <div class="alert alert-danger">--}}
{{--                            <ul>--}}
{{--                                @foreach ($errors->all() as $error)--}}
{{--                                    <li>{{ $error }}</li>--}}
{{--                                @endforeach--}}
{{--                            </ul>--}}
{{--                        </div>--}}
{{--                    @endif--}}
                    <form name="sentMessage" action="{{url('update/student/'.$student->id)}}" method="POST">
                        @csrf
                        <div class="control-group">
                            <div class="form-group floating-label-form-group controls">
                                <label>Student Name</label>
                                <input type="text" class="form-control" value="{{$student->name}}"  placeholder="Student Name" name="name">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>

                        <div class="control-group">
                            <div class="form-group floating-label-form-group controls">
                                <label>Student Email</label>
                                <input type="text" class="form-control" value="{{$student->email}}" placeholder="Student Email" name="email">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="control-group">
                            <div class="form-group floating-label-form-group controls">
                                <label>Student Phone NUM</label>
                                <input type="text" class="form-control" value="{{$student->phone}}" placeholder="Student Phone" name="phone">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <br>
                        <div id="success"></div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary" >Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

