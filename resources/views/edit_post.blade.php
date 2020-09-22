@extends('welcome')
@section('content')
    <div class="jumbotron">
        <h1 class="display-4">Write post</h1>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">

                    <a href="{{route('all.post')}}" class="btn btn-danger">All Posts</a>
                    <form name="sentMessage" id="contactForm" method="POST" action="{{url('update/post/'.$post->id)}}" enctype="multipart/form-data">
                        @csrf
                        <div class="control-group">
                            <div class="form-group floating-label-form-group controls">
                                <label>Post Title</label>
                                <input type="text" class="form-control" placeholder="title" id="name" name="title" value="{{$post->title}}">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="control-group">
                            <div class="form-group floating-label-form-group controls">
                                <label>Post Category</label>

                                <select class="form-control" name="category_id">
                                    @foreach($category as $row)
                                        <option value="{{$row->id}}"
                                        <?php
                                            if($row ->id == $post->category_id ) echo 'selected'
                                        ?>

                                        >{{$row->name}}</option>
                                    @endforeach
                                </select>

                            </div>
                        </div>
                        <div class="control-group">
                            <div class="form-group floating-label-form-group controls">
                                <label>Post Image</label>
                                <input type="file" class="form-control" placeholder="post image" name="image" id="email">
                                <p><img src="{{URL::to($post->image)}}"a style="width: 140px;height: 140px;"></p>
                                <input type="hidden" name="old_photo" value="{{$post->image}}">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>

                        <div class="control-group">
                            <div class="form-group floating-label-form-group controls">
                                <label>Post Details</label>
                                <textarea rows="5" class="form-control" placeholder="details" id="details" name="details">

                                    {{$post->details}}
                                </textarea>
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <br>
                        <div id="success"></div>
                        <div class="form-group">

                            <button type="submit" class="btn btn-primary" id="sendMessageButton">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
