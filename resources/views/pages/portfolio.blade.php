@extends('layouts.app')

@section('content')

<div class="hero-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-xl-12 text-center">
                <h1>Portfolio</h1>
            </div>
        </div>
    </div>
</div>
        <div class="portfolio-wrapper">
                <div class="container webservice-design">
            
                        <div class="row">
                                <div class="col-md-4">
                                    <a href="{{route('web_apps')}}">
                                       <div class="portfolio-box">
                                            <p class="portfolio-description">
                                                Full Stack Applications
                                            </p>
                                       </div>
                                       
                                    </a>
                                  
                                </div>
                                <div class="col-md-4">
                                  <a href="{{route('web_design')}}">
                                    <div class="portfolio-box">
                                        <p class="portfolio-description">
                                          Wordpress Design 
                                        </p>
                                    </div>
                                 </a>

                                </div>
                                <div class="col-md-4">
                                  {{-- <a href="{{route('')}}"> --}}
                                    <div class="portfolio-box">
                                        <p class="portfolio-description">
                                            Custom Front End 
                                        </p>
                                    </div>
                                  </a>
                      
                                   
                                  
                                </div>
                               
                              
                        </div>
                </div>
        </div>
</div>

@endsection
