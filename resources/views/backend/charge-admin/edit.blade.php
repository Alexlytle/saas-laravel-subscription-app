@extends('backend.layouts.master')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <h4>Update Single Charge</h4>
                    @if (session('success'))
                    <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
                    <div class="card">

                        <div class="card-body">
                        
                        <form class="forms-sample" action="{{route('storeSimpleChargeUpdate',[$charge->id])}}" method="post" enctype="multipart/form-data">@csrf
                            @method('PUT')
                                <div class="form-group">
                                    <label for="name">Single Charge Name</label>
                                <input type="text" name="name" value="{{$charge->name}}" class="form-control @error('name') is-invalid @enderror"
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
                                    <label for="description">Single Charge Description</label>
                                <input type="text" name="description" value="{{$charge->description}}" class="form-control @error('description') is-invalid @enderror"
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
                                    <label for="cost">Single Charge cost</label>
                                <input type="text" name="cost" value="{{$charge->cost}}" class="form-control @error('cost') is-invalid @enderror"
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
