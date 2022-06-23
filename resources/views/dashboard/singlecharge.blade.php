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
                        <th>Charge Name</th>
                        <th>Charge Amount</th>
                        <th>Action</th>
                   
                    </tr>
                </thead>
                <tbody>     
                   
                    @forelse ($charges as $charge)
                        <tr>
                          
                                    
                                        <td>{{$charge->name}}</td>
                                        <td>

                                            ${{ number_format($charge->cost, 2)}}
                                        </td>
                                        <td>  
                                             @if ($charge->completed == 'no')
                                            
                                             <a  data-barba-prevent="self"  href="{{ route('charge.show', $charge->slug) }}" class="btn btn-outline-dark pull-right">Choose</a>
                                            @else
                                                Already completed
                                            @endif</td>
                                    
 
                        </tr>
                    @empty
                        <td>No single charge to display</td>
                    @endforelse
            



                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
