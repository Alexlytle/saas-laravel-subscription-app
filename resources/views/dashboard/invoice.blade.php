@extends('layouts.app')

@section('content')
<div class="container dashboard-container">
    <div class="row justify-content-center">

        <div class="col-md-4">
            <x-user-dashboard-navigation/>
        </div>
        <div class="col-md-8">
            <h3>Invoices for {{auth()->user()->name}}  </h3>  
    
               
             
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                   
                   

            

                    <table class="table">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Price</th>
                                <th>Download</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($invoices as $invoice)
                            <tr>
                                <td>{{ $invoice->date()->toFormattedDateString() }}</td>
                                <td>{{ $invoice->total() }}</td>
                                <td><a href="/user/invoice/{{ $invoice->id }}">Download</a></td>
                            </tr>
                            @empty
                                <td>No invoices methods to show.</td>
                            @endforelse
                        </tbody>
                    </table>

               
                 
        
        </div>
    </div>
</div>
@endsection
