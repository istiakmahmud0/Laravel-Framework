@extends('welcome');
@section('content')
    <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
            @foreach($post as $posts)
            <div class="post-preview">
                <a href="{{URL::to('/view/post/'.$posts->id)}}">
                    <h2 class="post-title">
                       {{$posts->title}}
                    </h2>
                    <img src="{{url($posts->image)}}" style="height: 300px;">
{{--                    <h3 class="post-subtitle">--}}
{{--                        Problems look mighty small from 150 miles up--}}
{{--                    </h3>--}}
                </a>
                <p class="post-meta">
                    <a href="#">{{$posts->name}}</a>
                     </p>
            </div>
            <hr>
        @endforeach


            <div class="clearfix" style="text-align: center;">
                {{$post->links()}}
            </div>
        </div>
    </div>
@endsection
