@extends('welcome')
@section('content')
    <div class="jumbotron">
        <h1 class="display-4">Add Category</h1>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <a href="{{route('add.category')}}" class="btn btn-primary">Add Category</a>
                    <a href="{{route('all.category')}}" class="btn btn-danger">All Category</a>
                    <hr>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form name="sentMessage" action="{{route('store.category')}}" method="POST">
                        @csrf

                        <div class="control-group">
                            <div class="form-group floating-label-form-group controls">
                                <label>Category Name</label>
                                <input type="text" class="form-control" placeholder="Category Name" name="name">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>

                        <div class="control-group">
                            <div class="form-group floating-label-form-group controls">
                                <label>Slug Name</label>
                                <input type="text" class="form-control" placeholder="Slug Name" name="slug">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>


                        <br>
                        <div id="success"></div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary" >store</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
