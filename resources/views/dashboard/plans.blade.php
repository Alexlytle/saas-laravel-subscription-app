@extends('layouts.app')

@section('content')
<div class="container dashboard-container">
    <div class="row justify-content-center">

        <div class="col-md-4">
            <x-user-dashboard-navigation/>
        </div>
        <div class="col-md-8">
            <h3>Plans for {{auth()->user()->name}}  </h3>  

               
             
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                   
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Plan Name</th>
                                <th>Price</th>
                                <th>Description</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($plans as $plan)
                           
                                    <tr>
                                        <td>{{ $plan->name }}</td>
                                        <td>${{ number_format($plan->cost, 2) }} monthly</td>
                                        <td>{{ $plan->description }}</td>
                                        <td>{{($plan->completed == 'yes')? 'Completed':'Not Completed' }}</td>

                                  
                                        @if ($plan->completed == 'yes')
                                          <td>No Action</td>
                                        @else
                                            <td><a  data-barba-prevent="self"  href="{{ route('plans.show', $plan->slug) }}" class="btn btn-outline-dark pull-right">Choose</a></td>
                                        @endif 
                                             
                                
                                      
                                      
                                    </tr>
                           
                                @empty
                                    {{-- <td>No invoices to show</td> --}}
                            @endforelse
                        </tbody>
                    </table>
               
                 
                
        
        </div>
    </div>
</div>
@endsection
