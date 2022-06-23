@extends('layouts.app')
@section('content')
<div class="container">
    <div class="card" style="width:24rem;margin:auto;">

        
        <div class="card-body">
            <form action="{{route('store.plan')}}" method="post">
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
@endsection