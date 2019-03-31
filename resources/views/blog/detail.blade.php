@extends('layouts.app')
<style>
</style>

@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{$article->title}}</h5>
                <p class="card-text">{{$article->content}}</p>
                <p class="card-text">
                    <small class="text-muted">{{$article->updated_at}}</small>
                </p>
            </div>
            {{--<img src="..." class="card-img-top" alt="...">--}}
        </div>
    </div>
    <script type="text/javascript">
    </script>
@endsection
