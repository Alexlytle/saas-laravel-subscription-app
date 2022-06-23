@extends('backend.layouts.master')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <h4>Update Post</h4>
                    <div class="card">

                        <div class="card-body">

                        <form class="forms-sample" action="{{route('post.update',[$post->id])}}" method="post" enctype="multipart/form-data">@csrf
                            @method('PUT')
                                <div class="form-group">
                                    <label for="body">Body</label>
                                <input type="text" name="body" value="{{$post->body}}" class="form-control @error('body') is-invalid @enderror"
                                        placeholder="body of category">
                                    @error('body')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>
                                                {{ $message }}
                                            </strong>

                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="background_color">Background Color</label>
                                <input type="text" name="background_color" value="{{$post->background_color}}" class="form-control @error('background_color') is-invalid @enderror"
                                        placeholder="background_color of category">
                                    @error('background_color')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>
                                                {{ $message }}
                                            </strong>

                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="image">Image</label>
                                    <input type="file"  value="{{$post->image}}"class="form-control @error('image') is-invalid @enderror"
                                        name="image">
                                    @error('image')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>
                                                {{ $message }}
                                            </strong>

                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
