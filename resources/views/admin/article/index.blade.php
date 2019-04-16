@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-2">
                <nav class="nav flex-column">
                    <a class="nav-link active" href="/admin/article">Article</a>
                    <a class="nav-link" href="#">Link</a>
                    <a class="nav-link" href="#">Link</a>
                    <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                </nav>
            </div>
            <div class="col-md-8">
                <a class="btn btn-primary" href="/admin/article/create" role="button">New</a>

                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">CreatedAt</th>
                        <th scope="col">UpdatedAt</th>
                        <th scope="col">Handle</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($data['list'] as $article)
                        <tr>
                            <th scope="row">{{$article->id}}</th>
                            <th>{{$article->title}}</th>
                            <th>{{$article->created_at}}</th>
                            <th>{{$article->updated_at}}</th>
                            <th>
                                <a class="btn btn-primary" href="/blog/{{$article->id}}"
                                   role="button">Detail</a>
                                <a class="btn btn-primary" href="/admin/article/{{$article->id}}/edit" role="button">Edit</a>
                                <a class="btn btn-danger" href="javascript:void(0)"
                                   onclick="delArticle({{$article->id}})">Delete</a>
                            </th>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        function delArticle(id) {
            console.log(id);
            swal({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover this article!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {
                    axios({
                        method: 'DELETE',
                        url: '/admin/article/' + id,
                    }).then(function (res) {
                        if (res.data.status == 200) {
                            swal("Poof! The article has been deleted!", {
                                buttons: false,
                                timer: 2000,
                                icon: "success",
                            });
                            window.location.reload();
                        } else {
                            swal("Delete failed!", {
                                buttons: false,
                                timer: 2000,
                                icon: "warning",
                            });
                        }
                    })
                }
            });
        }
    </script>
@endsection


