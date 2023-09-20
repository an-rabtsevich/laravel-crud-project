@extends('layouts.master')

@section('content')
    <div class="main-content mt-3">
        <div class="card">

            <div class="card-header">
                <div class="row">
                    <div class="col-sm-6">
                        <h4>Trashed Posts</h4>
                    </div>
                    <div class="col-sm-6 d-flex justify-content-end">
                        <a href="{{route('posts.index')}}" class="btn btn-dark">Back</a>
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
                            <th scope="row">{{$post->id}}</th>
                            <td>
                                <img src="{{asset($post->image)}}" alt="" style="width: 100px;">
                            </td>
                            <td>{{$post->title}}</td>
                            <td>{{$post->description}}</td>
                            <td>{{$post->category->name}}</td>
                            <td>{{date('d-m-Y', strtotime($post->created_at))}}</td>
                            <td>
                                <a href="{{route('posts.restore', $post->id)}}" class="btn btn-sm btn-success">Restore</a>

                                <form action="{{route('posts.force_delete', $post->id)}}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger">Delete</button>
                                </form>
                            </td>
                            </tr>   
                        @endforeach

                    </tbody>
                  </table>
            </div>
        </div>
    </div>
@endsection