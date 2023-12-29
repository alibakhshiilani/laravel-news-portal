@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="row">
                @foreach($categories as $category)

                    <div class="col-md-6">
                        <div class="card mb-4 news-category-card">
                            <div class="card-header bg-transparent h4">{{ $category->title }}</div>

                            <div class="card-body">
                                <div class="row">
                                    @foreach($category->posts as $key=>$news)


                                        @if($key == 0)
                                            <div class="d-flex mb-3 news-category-headline">
                                                <a class="figure" href="{{route("news.show",["id"=>$news->id,"slug"=>$news->slug])}}">
                                                    <img src="/{{date("Y/m/d",strtotime($news->created_at))}}/{{$news->media}}" alt="">
                                                </a>
                                                <div>
                                                    <a class="text-decoration-none text-dark" href="{{route("news.show",["id"=>$news->id])}}">
                                                        {{--                                            <a class="text-decoration-none text-dark" href="{{route("news.show",["id"=>$news->id,"slug"=>$news->slug])}}">--}}
                                                        <h2 class="h4">{{$news->title}}</h2>
                                                    </a>
                                                    <p>{{$news->description}}</p>
                                                </div>
                                            </div>
                                        @else
                                            @if($key == 1)
                                                <ul class="cat-list news-list">
                                                    @endif
                                                    <li class="d-flex justify-content-between align-items-center">

                                                        <a class="text-decoration-none text-dark" href="{{route("news.show",["id"=>$news->id])}}">
                                                            {{--                                                <a class="text-decoration-none text-dark" href="{{route("news.show",["id"=>$news->id,"slug"=>$news->slug])}}">--}}
                                                            <h2>{{$news->title}}</h2>
                                                        </a>

                                                        <a href="/source/{{$news->source_id}}/">
                                                            <span class="source-badge badge bg-black bg-opacity-75 fw-normal">{{$news->source_name}}</span>
                                                        </a>
                                                    </li>
                                                    @if($key == $category->posts->count() - 1)
                                                </ul>
                                            @endif
                                        @endif


                                    @endforeach
                                </div>
                            </div>
                        </div>

                    </div>

                @endforeach
            </div>
        </div>
        <div class="col-md-12">
            <div class="card mb-4">
                <div class="card-header h4">پربازدید</div>

                <div class="card-body">

                </div>
            </div>

            <div class="card mb-4">
                <div class="card-header h4">تصادفی</div>

                <div class="card-body">

                </div>
            </div>

            <div class="card mb-4">
                <div class="card-header h4">پرطرفدار</div>

                <div class="card-body">

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
