@extends('backend.layouts.master')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <h4>Update Plan</h4>
                    @if (session('success'))
                    <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
                    <div class="card">

                        <div class="card-body">

                        <form class="forms-sample" action="{{route('plan.update',[$plan->id])}}" method="post" enctype="multipart/form-data">@csrf
                            @method('PUT')
                                <div class="form-group">
                                    <label for="name">Plan Name</label>
                                <input type="text" name="name" value="{{$plan->name}}" class="form-control @error('name') is-invalid @enderror"
                                        placeholder="plan name">
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>
                                                {{ $message }}
                                            </strong>

                                        </span>
                                    @enderror
                                </div>

                         

                                <div class="form-group">
                                    <label for="description">Plan Description</label>
                                <input type="text" name="description" value="{{$plan->description}}" class="form-control @error('description') is-invalid @enderror"
                                        placeholder="plan cost">
                                    @error('cost')
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
