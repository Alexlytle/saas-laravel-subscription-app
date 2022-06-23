@extends('backend.layouts.master')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <h4>Add post</h4>
                    <div class="card">

                        <div class="card-body">

                        <form class="forms-sample" action="{{route('post.create')}}" method="post" enctype="multipart/form-data">
                            @csrf
                      
                                <div class="form-group">
                                    <label for="body">Body</label>
                                    <textarea rows="4" cols="50" name="body" class="form-control @error('body') is-invalid @enderror"
                                        placeholder="body of post"></textarea>
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
                                    <input type="text" value="{{old('background_color')}}" name="background_color" class="form-control @error('background_color') is-invalid @enderror"
                                        placeholder="Background of post">
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
                                    <input type="file" class="form-control @error('image') is-invalid @enderror"
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
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
