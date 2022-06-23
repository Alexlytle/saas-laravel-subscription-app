@extends('backend.layouts.master')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            @include('backend.inc.message')
            <h4>Manage Posts</h4>
            <div class="row justify-content-center">
                @if (session('success'))
                <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">


                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Email</th>
                                            
                                            <th>End date</th>
                                            <th>Trial End</th>
                                            <th>Upgrade Subscription</th>
                                            <th>End Subscription</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($subscriptions as $subscription)

                                     
                                  
                                            <tr>
                                               
                                              
                                                     
                                                       
                                                           
                                                            <td>{{$subscription->user->name}}</td>
                                                            <td>{{$subscription->user->email}}</td>
                                                            {{-- <td>{{$subscription->ends_at}}</td> --}}
                                                             <td>{{($subscription->ends_at== null)? 'No End Date':$subscription->ends_at}}</td> 
                                                            <td>{{($subscription->trial_end_date == null)? 'No trial':$subscription->trial_end_date}}</td>
                                                            <td> <a href="{{route('subscription.edit',[$subscription->id])}}"> Upgrade Subscription</a></td>

                                                            <td>
                                                                <!-- Button trigger modal -->
                                                                <button type="button" class="btn btn-danger" data-toggle="modal"
                                                                    data-target="#exampleModal{{ $subscription->id }}">
                                                                     <i class="mdi mdi-delete"></i>
                                                                </button>
            
                                                                <!-- Modal -->
                                                                <div class="modal fade" id="exampleModal{{ $subscription->id }}" tabindex="-1"
                                                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                    <div class="modal-dialog">
                                                                        <form action="{{ route('subscription.destroy', $subscription->id) }}"
                                                                            method="post">@csrf
                                                                            @method('DELETE')
                                                                            <div class="modal-content">
                                                                                <div class="modal-header">
                                                                                    <h5 class="modal-title" id="exampleModalLabel">Delete
                                                                                        confirmation</h5>
                                                                                    <button type="button" class="close" data-dismiss="modal"
                                                                                        aria-label="Close">
                                                                                        <span aria-hidden="true">&times;</span>
                                                                                    </button>
                                                                                </div>
                                                                                <div class="modal-body">
                                                                                   <p> Are you sure you want to delete this subscription ?</p>
            
                                                                                </div>
                                                                                <div class="modal-footer">
                                                                                    <button type="button" class="btn btn-secondary"
                                                                                        data-dismiss="modal">Cancel</button>
                                                                                    <button type="submit"
                                                                                        class="btn btn-danger">Yes Delete Subscription</button>
                                                                                </div>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
            
            
            
                                                            </td> 
                                                       
                                           
                                          
                                             


                                              


                                            </tr>
                                        @empty
                                            <td>No category to display</td>
                                        @endforelse



                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        @endsection
