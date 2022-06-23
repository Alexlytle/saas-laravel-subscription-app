@extends('layouts.app')

@section('content')
<div class="container dashboard-container">
    <div class="row justify-content-center">

        <div class="col-md-4">
            <x-user-dashboard-navigation/>
        </div>
        <div class="col-md-8">
            <table class="table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th>Trial End</th>
                   
                    </tr>
                </thead>
                <tbody>
                    @forelse ($subscriptions as $subscription)
                        <tr>
                          
                                        <td>{{explode("|",$subscription->name)[0]}}</td>
                                        <td>{{$subscription->user->email}}</td>
                                        {{-- <td>{{$subscription->ends_at}}</td> --}}
                                         <td>{{($subscription->ends_at== null)? 'Active': 'Ended at'. $subscription->ends_at}}</td> 
                                        <td>{{($subscription->trial_end_date == null)? 'No trial':$subscription->trial_end_date}}</td>

                        </tr>
                    @empty
                        <td>No subscriptions to display</td>
                    @endforelse



                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
