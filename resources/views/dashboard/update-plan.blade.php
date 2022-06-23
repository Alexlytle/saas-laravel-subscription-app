@extends('layouts.app')

@section('content')
<div class="container dashboard-container">
    <div class="row justify-content-center">

        <div class="col-md-4">
            <x-user-dashboard-navigation/>
        </div>
        <div class="col-md-8">
          
     
               
             
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

           

                    <table class="table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Description</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($plans as $plan)
                                <tr>
                                   
                                    <td>{{ $plan->name }}</td>
                                    <td>${{ number_format($plan->cost, 2) }} monthly</td>
                                    <td>{{ $plan->description }}</td>
                                    <td> <a  data-barba-prevent="self" href="{{ route('frontend.plans.update', $plan->slug) }}" class="btn btn-outline-dark pull-right">Update Card</a></td>
                                </tr>
                            @empty
                                <td>No payment methods to show</td>
                            @endforelse
                        </tbody>
                    </table>



                    
                 
                
            
        </div>
    </div>
</div>
@endsection
