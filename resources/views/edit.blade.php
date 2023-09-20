@extends('layouts.master')

@section('content')
    <div class="main-content mt-3">

        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger">{{$error}}</div>
            @endforeach
        @endif

        <div class="card">

            <div class="card-header">
                <div class="row">
                    <div class="col-sm-6">
                        <h4>Edit Post</h4>
                    </div>
                    <div class="col-sm-6 d-flex justify-content-end">
                        <a href="{{route('posts.index')}}" class="btn btn-dark">Back</a>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <form action="{{route('posts.update', $post->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="" class="d-block">Image</label>
                        <img src="{{asset($post->image)}}" alt="" style="width: 100px;" class="my-2">
                        <input type="file" name="image" id="" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Title</label>
                        <input type="text" name="title" id="" class="form-control" value="{{$post->title}}">
                    </div>
                    <div class="form-group">
                        <label for="">Category</label>
                        <select name="category_id" id="" class="form-control">
                            <option value="">Select</option>
                            @foreach ($categories as $category)
                            <option {{$category->id == $post->category_id ? 'selected' : ''}} value="{{$category->id}}">{{$category->name}}</option> 
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Description</label>
                        <textarea name="description" id="" cols="30" rows="10" class="form-control">{{$post->description}}</textarea>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary mt-3">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection