@extends('layouts.app')

@section('content')

<div class="hero-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-xl-12 text-center">
                <h1>Ready To Get Started</h1>
                <p><strong>Contact WebField To Get Started on Your Dream Project Today.</strong><br></p>
                <div class="hero-call-to-action d-flex justify-content-center">
                  
                    <a href="{{route('portfolio')}}">VIEW PORTFOLIO</a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="contact-wrapper">
    <div class="container">
        {{-- <div class="col  d-flex justify-content-center">
            <h3>Drop a message.</h3>
        </div> --}}

  
        <div class="row  d-flex justify-content-center">
                    <div class="col-md-7">
                        @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
                
                        <form class="contact-form" action="{{route('public_email')}}" method="post" enctype="multipart/form-data">
                            @csrf
    
                            <div class="form-group">
                                <label for="firstname">First Name: </label>
                                <input name="firstname" class="form-control @error('firstname') is-invalid @enderror" placeholder="type first name"/>
                                @error('firstname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>
                                            {{ $message }}
                                        </strong>
        
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="lastname">Last Name: </label>
                                <input name="lastname" class="form-control @error('lastname') is-invalid @enderror" placeholder="type last name"/>
                                @error('lastname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>
                                            {{ $message }}
                                        </strong>
        
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="email"> Email Address: </label>
                                <input name="email" class="form-control @error('email') is-invalid @enderror" placeholder="type email"/>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>
                                            {{ $message }}
                                        </strong>
        
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                    <label for="question">Question: </label>
                                    <textarea rows="4" cols="50" name="question" class="form-control @error('question') is-invalid @enderror"
                                        placeholder="type question here"></textarea>
                                    @error('question')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>
                                                {{ $message }}
                                            </strong>
            
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="math"> 5 + 8 =</label>
                                    <input name="math" class="form-control @error('math') is-invalid @enderror" placeholder="type answer"/>
                                    @error('math')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>
                                                {{ $message }}
                                            </strong>
            
                                        </span>
                                    @enderror
                                </div>
                              
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Send it</button>
                                </div>
                            </form>
                    </div>
                    <div class="col-md-6">


                    </div>
            
                    
                         
                  
                

            </div>
      

    </div>
    </div>
</div>

@endsection
