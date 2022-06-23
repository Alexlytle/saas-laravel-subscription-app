@extends('backend.layouts.master')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            @include('backend.inc.message')
            <h4>Single Charge</h4>
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
                                            <th>Description</th>
                                            <th>Price</th>
                                            <th>Edit Single Charge</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @forelse($charges as $charge)

                                      
                                            <tr>
        
                                                <td>
                                                   
                                                        {{ $charge->name }}
                                           
                                                   
                                                </td>
                                                <td>{{ $charge->description }}</td>
                                                <td>{{ $charge->cost }}</td>
                                                <td>
                                                    <a href="{{ route('storeSimpleChargeEdit', $charge) }}"><button
                                                            class="btn btn-info">
                                                            <i class="mdi mdi-table-edit"></i>
                                                        </button> 
                                                    </a>

                                                </td>
                                            

                                                
                                                <td>
                                                    <!-- Button trigger modal -->
                                                   <button type="button" class="btn btn-danger" data-toggle="modal"
                                                        data-target="#exampleModal{{ $charge->id }}">
                                                         <i class="mdi mdi-delete"></i>
                                                    </button>

                                                    <!-- Modal -->
                                                    <div class="modal fade" id="exampleModal{{ $charge->id }}" tabindex="-1"
                                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <form action="{{ route('storeSimpleChargeDelete', $charge->id) }}"
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
                                                                       <p> Are you sure you want to delete this item ?</p>

                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary"
                                                                            data-dismiss="modal">Cancel</button>
                                                                        <button type="submit"
                                                                            class="btn btn-danger">Yes Delete it</button>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div> 



                                                </td> 


                                            </tr>
                                        @empty
                                            <td>No plans to display</td>
                                        @endforelse



                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        @endsection
