@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col"></div>
            <div class="col-8">
                <div class="card">
                    <div class="card-body">
                        <h1 class="card-title page-header" style="margin: 0.4em 0 0.2em 0;
    padding: 0 0 0.2em 0;
    color: #000000;
    font-weight: 500;
    letter-spacing: -0.03em;
    border-bottom: 1px solid #d3d3d3;">{{$article->title}}</h1>
                        <p id='content' class="card-text">{!! $article->content !!}</p>
                        <p class="card-text">
                            <small class="text-muted">{{$article->updated_at}}</small>
                        </p>
                    </div>
                    {{--<img src="..." class="card-img-top" alt="...">--}}
                </div>
            </div>
            <div class="col"></div>
        </div>
    </div>
@endsection
