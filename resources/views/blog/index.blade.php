@extends('layouts.app')
<style>
    div .card-body:hover{
        cursor:pointer;
    }
</style>

@section('content')
    <div class="container-fluid">
        @foreach ($list as $article)
            <div class="card">
                <div class="card-body" onclick="detail({{$article->id}})">
                    <h5 class="card-title">{{$article->title}}</h5>
                    <p class="card-text">{!! $article->content !!}</p>
                    <p class="card-text">
                        <small class="text-muted">{{$article->updated_at}}</small>
                    </p>
                </div>
                {{--<img src="..." class="card-img-top" alt="...">--}}
            </div>
        @endforeach
    </div>
    <script type="text/javascript">
        function detail(id) {
            window.location.href="/blog/" + id;
        }
    </script>
@endsection
