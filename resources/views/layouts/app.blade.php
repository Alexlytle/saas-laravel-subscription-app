<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {!! SEOMeta::generate() !!}
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    {{-- <link rel="icon" href="http://example.com/favicon.png"> --}}
    <!-- Scripts -->
    

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter&amp;display=swap">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    
</head>
<body data-barba="wrapper">
  
  <div class="load-container">
    <div class="loading-screen"></div>
</div>
        <nav class="nav-header-wrapper">
            <div class="nav-header-container">
                <a href="{{route('home_page')}}">
                    <img src="/img/webfield.png" alt="">
                </a>
              
              <ul class="menu-items">
                  <li>
                    <a id="logo_page" style="color:{{Route::current()->getName() =="logo_page"?'#247295':'' }}"  href="{{route('logo_page')}}">LOGO DESIGN</a>  
                    </li>
                  <li>
                    <a id="web_design" style="color:{{Route::current()->getName() =="web_design"?'#247295':'' }}"  href="{{route('web_design')}}">WEB DESIGN</a>  
                    </li>
                    <li> 
                      <a id="webdevelopment" style="color:{{Route::current()->getName() =="webdevelopment"?'#247295':'' }}"  href="{{route('webdevelopment')}}">
                        WEB APPS
                      </a>  
                    </li>
                  {{-- <li>
                    <a id="web_apps" style="color:{{Route::current()->getName() =="web_apps"?'#247295':'' }}"  href="{{route('web_apps')}}">WEB APPS</a> 
                    </li>
                    --}}
                  <li> 
                    <a id="about_page" style="color:{{Route::current()->getName() =="about_page"?'#247295':'' }}"  href="{{route('about_page')}}">ABOUT</a>  
                  </li>
                    <li>
                        <a id="contact_page"style="color:{{Route::current()->getName() =="contact_page"?'#247295':'' }}"  href="{{route('contact_page')}}">CONTACT</a>  
                    </li>
                  <li class="drop-down-menu">
                    @guest
                      <a  id="dashboard" style="color:{{Route::current()->getName() =="dashboard"?'#247295':'' }}"  href="{{route('dashboard')}}">ACCOUNT</a>  
                    @endguest
                   @auth
                       <a  id="dashboard" style="color:{{Route::current()->getName() =="dashboard"?'#247295':'' }}"  href="{{route('dashboard')}}">
                        {{auth()->user()->name}}
                      </a>  
                   @endauth
                  
                      <ul class="menu-drop-list">
                         
                          @guest
                               
                              <li>
                                <a href="{{route('register')}}"> Register</a>
                            
                            </li>
                            <li>
                                <a href="{{route('login')}}">  Login</a>
                            
                            </li>
                          @endguest
                            @auth
                            <li>
                              <form action="{{ route('logout') }}" method="post" class="p-3 inline">
                                  @csrf
                               
                                    <button style="background: whitesmoke;border: none;"  type="submit">Logout</button>
                                
                            
                              </form>
                          </li>
                            @endauth
                       
                      </ul>
                  </li>
        
                  <div class="burger">
                    <div class="line1"></div>
                    <div class="line2"></div>
                  </div>
              </ul>
                
            </div>
          
        </nav>

        <main data-barba="container" data-barba-namespace="{{Route::current()->getName()}}" id="app">
            @yield('content')
            <div class="footer-wrapper">
                <div class="container">
                 <div class="row d-flex justify-content-center" style="background: #f0f0f0">
                    <div class="col-md-2"> ©WebFeild 2022</div>
               
                 </div>
                
                </div>
                   
                    
              </div>
          </div>
        </main>
  
      
        <nav class="nav-bar">
          <ul class="menu-items">
            <li>
              <a id="logo_page" style="color:{{Route::current()->getName() =="logo_page"?'#247295':'' }}"  href="{{route('logo_page')}}">LOGO DESIGN</a>  
              </li>
            <li>
              <a id="web_design" style="color:{{Route::current()->getName() =="web_design"?'#247295':'' }}"  href="{{route('web_design')}}">WEB DESIGN</a>  
              </li>
            {{-- <li>
              <a id="web_apps" style="color:{{Route::current()->getName() =="web_apps"?'#247295':'' }}"  href="{{route('web_apps')}}">WEB APPS</a> 
              </li>
           --}}
           <li> 
              <a id="about_page" style="color:{{Route::current()->getName() =="about_page"?'#247295':'' }}"  href="{{route('about_page')}}">ABOUT</a>  
            </li>
            <li> 
              <a id="webdevelopment" style="color:{{Route::current()->getName() =="webdevelopment"?'#247295':'' }}"  href="{{route('webdevelopment')}}">
                WEB DEVELOPMENT
              </a>  
            </li>

              <li>
                  <a id="contact_page"style="color:{{Route::current()->getName() =="contact_page"?'#247295':'' }}"  href="{{route('contact_page')}}">CONTACT</a>  
              </li>
            <li class="drop-down-menu">
              @guest
                <a  id="dashboard" style="color:{{Route::current()->getName() =="dashboard"?'#247295':'' }}"  href="{{route('dashboard')}}">ACCOUNT</a>  
              @endguest
             @auth
                 <a  id="dashboard" style="color:{{Route::current()->getName() =="dashboard"?'#247295':'' }}"  href="{{route('dashboard')}}">
                  {{auth()->user()->name}}
                </a>  
             @endauth
            
                <ul class="menu-drop-list">
                   
                    @guest
                         
                        <li>
                          <a href="{{route('register')}}"> Register</a>
                      
                      </li>
                      <li>
                          <a href="{{route('login')}}">  Login</a>
                      
                      </li>
                    @endguest
                      @auth
                      <li>
                        <form action="{{ route('logout') }}" method="post" class="p-3 inline">
                            @csrf
                         
                              <button style="background: whitesmoke;border: none;"  type="submit">Logout</button>
                          
                      
                        </form>
                    </li>
                      @endauth
                 
                </ul>
    
          </nav>

          {{-- <div class="swipe swipe1"></div> --}}
          {{-- <div class="swipe swipe2"></div> --}}
          {{-- <div class="swipe swipe3"></div> --}}
        
     
  
    <script src="https://unpkg.com/@barba/core"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.9.1/gsap.min.js" integrity="sha512-H6cPm97FAsgIKmlBA4s774vqoN24V5gSQL4yBTDOY2su2DeXZVhQPxFK4P6GPdnZqM9fg1G3cMv5wD7e6cFLZQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://unpkg.com/vue@3.0"></script>
        <script src="{{ asset('js/app.js') }}"></script>
    @yield('scripts')


   
  

</body>
</html>
