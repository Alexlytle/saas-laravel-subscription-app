@extends('backend.layouts.master')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <h4>Create Plan</h4>
                    @if (session('success'))
                    <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
                    <div class="card">

                        <div class="card-body">

                            <form action="{{route('plan.store')}}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="plan name">Plan Name:</label>
                                    <input type="text" class="form-control" name="name"  @error('name') is-invalid @enderror name="name" value="{{ old('name') }}" placeholder="Enter Plan Name">
                                </div>
                                <div class="form-group">
                                    <label for="cost">Cost:</label>
                                    <input type="text" class="form-control" name="cost"   @error('cost') is-invalid @enderror name="cost" value="{{ old('cost') }}" placeholder="Enter Cost">
                                </div>
                                <div class="form-group">
                                    <label for="user">Select plan for user: </label>
                                   <select name="user"  class = "form-control" id="">
                                       @foreach ($users as $user)
                                         <option value="{{$user->id}}">{{$user->name}}</option>
                                       @endforeach
                                    
                                   </select>
                                </div>
                                <div class="form-group">
                                    <label for="cost">Plan Description:</label>
                                    <input type="text"  class="form-control" name="description" placeholder="Enter Description">
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
