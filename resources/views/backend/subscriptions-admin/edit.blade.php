@extends('backend.layouts.master')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <h4>Upgrade Subscription</h4>
                    @if (session('success'))
                    <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
                    <div class="card">

                        <div class="card-body">

                        <form class="forms-sample" action="{{route('subscription.update',[$subscription->id])}}" method="post" enctype="multipart/form-data">@csrf
                            @method('PUT')
                                <div class="form-group">
                                    <input type="hidden" name="current_plan_id" value="{{$subscription->id}}">
                                    <label for="plans">Plan to swith to</label>
                            
                                        <select name="plans" class="form-control" id="exampleFormControlSelect1">

                                            @foreach ($user_plans  as $plan)
                                                        
                                                     <option  value="{{$plan->stripe_plan}}|{{$plan->id}}|{{$plan->name}}|{{$plan->cost}}" >{{$plan->name}}</option>
                                            @endforeach
                                        
                                       
                                       
                                          </select>

                                    @error('plans')
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
