@extends('layouts.master')

@section('content')
    <div class="main-content mt-3">
        <div class="card">

            <div class="card-header">
                <div class="row">
                    <div class="col-sm-6">
                        <h4>All Posts</h4>
                    </div>
                    <div class="col-sm-6 d-flex justify-content-end">
                        @can('create', \App\Models\Post::class)
                        <a href="{{route('posts.create')}}" class="btn btn-success me-2">Create</a>
                        <a href="{{route('posts.trashed')}}" class="btn btn-dark">Trashed</a>
                        @endcan
                    </div>
                </div>
            </div>

            <div class="card-body">
                <table class="table table-striped table-bordered border-dark">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col" style="width: 10%;">Image</th>
                        <th scope="col" style="width: 20%;">Title</th>
                        <th scope="col" style="width: 30%;">Description</th>
                        <th scope="col" style="width: 10%;">Category</th>
                        <th scope="col" style="width: 12%;">Publish Date</th>
                        <th scope="col" style="width: 18%;">Action</th>
                      </tr>
                    </thead>
                    <tbody>

                        @foreach ($posts as $post)
                            <tr>
                            <th scope="row">{{++$loop->index}}</th>
                            <td>
                                <img src="{{asset($post->image)}}" alt="" style="width: 100px;">
                            </td>
                            <td>{{$post->title}}</td>
                            <td>{{$post->description}}</td>
                            <td>{{$post->category->name}}</td>
                            <td>{{date('d-m-Y', strtotime($post->created_at))}}</td>
                            <td>
                                <a href="{{route('posts.show', $post->id)}}" class="btn btn-sm btn-success">Show</a>

                                @can('update', $post)
                                    <a href="{{route('posts.edit', $post->id)}}" class="btn btn-sm btn-primary">Edit</a>
                                @endcan

                                @can('delete', $post)
                                    <form action="{{route('posts.destroy', $post->id)}}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger">Delete</button>
                                    </form>
                                @endcan
                            </td>
                            </tr>   
                        @endforeach

                    </tbody>
                  </table>
            </div>
        </div>
        <div class="mt-2">{{$posts->links()}}</div>
    </div>
@endsection