@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-7">


                    <div class="card mb-4">
                        <div class="card-header h4">{{ $category->title }}</div>

                        <div class="card-body">
                            <div class="row">
                                @foreach($category->posts as $key=>$news)


                                    <div class="d-flex mb-3">
                                        <a class="figure" href="{{route("news.show",["id"=>$news->id,"slug"=>$news->slug])}}">
                                            <img src="/{{date("Y/m/d",strtotime($news->created_at))}}/{{$news->media}}" alt="">
                                        </a>
                                        <div>
                                            <a class="text-decoration-none text-dark" href="{{route("news.show",["id"=>$news->id,"slug"=>$news->slug])}}">
                                                <h2 class="h4">{{$news->title}}</h2>
                                            </a>
                                            <p>{{$news->description}}</p>
                                        </div>
                                    </div>


                                @endforeach
                            </div>
                        </div>
                    </div>


            </div>
            <div class="col-md-2">
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
            <div class="col-md-3">
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
