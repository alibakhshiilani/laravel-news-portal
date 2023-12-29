@extends('layouts.app')

@section('content')
    <style>
        .embed-container {
            display: flex;
            /*background: #fce6b6;*/
            border: 8px solid #446eac;
            /*box-shadow: 0px 5px 10px 0px rgba(0, 0, 0, 0.5);*/
            /*border: solid 3vmin #fce6b6;*/
            border-bottom-color: #fff;
            border-left-color: #eee;
            border-right-color: #eee;
            border-top-color: #ddd;
            box-sizing: border-box;
            background:url(/static/index.svg) top center no-repeat;
        }
    </style>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card mb-4">
{{--                    <div class="card-header h4">{{ $news->title }}</div>--}}

                    <div class="card-body">
                        <div class="row">
                            <div class="d-flex justify-content-start">

                                @if(isset($news->media))
                                    <img class="rounded-2" src="/{{date("Y/m/d",strtotime($news->created_at))}}/{{$news->media}}" alt="">
                                @endif
                                <div class="p-3">
                                    <h2 class="h3">{{$news->title}}</h2>
                                    <p>{{$news->description}}</p>
                                    <small>منبع : <a target="_blank" rel="nofollow" href="{{$news->url}}">{{$news->url}}</a></small>
                                </div>

                            </div>
                            <div class='embed-container'>
                                <iframe title="{{$news->title}}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen src="{{$news->url}}" width="100%" height="1200px"></iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
{{--            <div class="col-md-4">--}}
{{--                <div class="card mb-4">--}}
{{--                    <div class="card-header h4">پربازدید</div>--}}

{{--                    <div class="card-body">--}}
{{--                        @if (session('status'))--}}
{{--                            <div class="alert alert-success" role="alert">--}}
{{--                                {{ session('status') }}--}}
{{--                            </div>--}}
{{--                        @endif--}}

{{--                        {{ __('You are logged in!') }}--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <div class="card mb-4">--}}
{{--                    <div class="card-header h4">تصادفی</div>--}}

{{--                    <div class="card-body">--}}
{{--                        @if (session('status'))--}}
{{--                            <div class="alert alert-success" role="alert">--}}
{{--                                {{ session('status') }}--}}
{{--                            </div>--}}
{{--                        @endif--}}

{{--                        {{ __('You are logged in!') }}--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <div class="card mb-4">--}}
{{--                    <div class="card-header h4">پرطرفدار</div>--}}

{{--                    <div class="card-body">--}}
{{--                        @if (session('status'))--}}
{{--                            <div class="alert alert-success" role="alert">--}}
{{--                                {{ session('status') }}--}}
{{--                            </div>--}}
{{--                        @endif--}}

{{--                        {{ __('You are logged in!') }}--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
        </div>
    </div>
@endsection
