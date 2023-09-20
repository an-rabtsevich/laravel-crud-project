@extends('layouts.master')

@section('content')
    <div class="main-content mt-3">
        <div class="card">

            <div class="card-header">
                <div class="row">
                    <div class="col-sm-6">
                        <h4>Show Post</h4>
                    </div>
                    <div class="col-sm-6 d-flex justify-content-end">
                        <a href="{{route('posts.index')}}" class="btn btn-dark">Back</a>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <table class="table table-striped table-bordered border-dark">
                    <tbody>
                        <tr>
                            <td>Id</td>
                            <td>{{$post->id}}</td>
                        </tr>
                        <tr>
                            <td>Image</td>
                            <td><img src="{{asset($post->image)}}" alt="" width="300"></td>
                        </tr>
                        <tr>
                            <td>Titile</td>
                            <td>{{$post->title}}</td>
                        </tr>
                        <tr>
                            <td>Description</td>
                            <td>{{$post->description}}</td>
                        </tr>
                        <tr>
                            <td>Category</td>
                            <td>{{$post->category->name}}</td>
                        </tr>
                        <tr>
                            <td>Publish Date</td>
                            <td>{{date('d-m-Y', strtotime($post->created_at))}}</td>
                        </tr>

                    </tbody>
                  </table>
            </div>
        </div>
    </div>
@endsection