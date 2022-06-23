@extends('layouts.app')

@section('content')
<div class="container dashboard-container">
    <div class="row justify-content-center">

        <div class="col-md-4">
            <x-user-dashboard-navigation/>
        </div>
        <div class="col-md-8">

            @if (session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif

            <h3>Need Help, Please Send Your Question</h3>
            <h4>WebField will get back to you in 1-2 business days.</h4>
            <small>WebField will use your email that you have on file</small>
            <form class="forms-sample" action="{{route('send_support_email',[auth()->user()->id])}}" method="post" enctype="multipart/form-data">
                @csrf
          
                    <div class="form-group">
                        <label for="question">Question: </label>
                        <textarea rows="4" cols="50" name="question" class="form-control @error('question') is-invalid @enderror"
                            placeholder="type here"></textarea>
                        @error('question')
                            <span class="invalid-feedback" role="alert">
                                <strong>
                                    {{ $message }}
                                </strong>

                            </span>
                        @enderror
                    </div>
                  
                  
                    <div class="form-group">
                        <button type="submit" class="btn btn-secondary">Send it</button>
                    </div>
                </form>
        </div>
    </div>
</div>
@endsection
