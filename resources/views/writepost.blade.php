@extends('welcome')
@section('content')
    <div class="jumbotron">
        <h1 class="display-4">Write post</h1>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <a href="{{route('add.category')}}" class="btn btn-primary">Add Category</a>
                    <a href="{{route('all.category')}}" class="btn btn-danger">All Category</a>
                    <a href="{{route('all.post')}}" class="btn btn-danger">All Posts</a>
                    <form name="sentMessage" id="contactForm" method="POST" action="{{route('store.post')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="control-group">
                            <div class="form-group floating-label-form-group controls">
                                <label>Post Title</label>
                                <input type="text" class="form-control" placeholder="title" id="name" name="title">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="control-group">
                            <div class="form-group floating-label-form-group controls">
                                <label>Post Category</label>

                                 <select class="form-control" name="category_id">
                                     @foreach($category as $row)
                                     <option value="{{$row->id}}">{{$row->name}}</option>
                                     @endforeach
                                 </select>

                            </div>
                        </div>
                        <div class="control-group">
                            <div class="form-group floating-label-form-group controls">
                                <label>Post Image</label>
                                <input type="file" class="form-control" placeholder="post image" name="image" id="email">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>

                        <div class="control-group">
                            <div class="form-group floating-label-form-group controls">
                                <label>Post Details</label>
                                <textarea rows="5" class="form-control" placeholder="details" id="details" name="details"></textarea>
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <br>
                        <div id="success"></div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary" id="sendMessageButton">Send</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
