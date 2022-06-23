@extends('layouts.app')

@section('content')

<div class="hero-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-xl-12 text-center">
                <h1>Website Design 
                    &amp; Development Services.<br></h1>
                <p><strong>A ONE STOP SHOP TO CONNECT YOUR BUSINESS TO THE WEB.</strong><br><strong>FROM HOSTING, BRANDING AND LOGO. WE DO IT ALL!</strong><br></p>
                <div class="hero-call-to-action d-flex justify-content-center">
                    <a href="{{route('contact_page')}}">CONTACT ME</a>
                    <a href="{{route('web_design')}}">VIEW PORTFOLIO</a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="services-wrapper">
    <div class="container">
        <div class="col">
            <h1>Our Services</h1>
        </div>
        <div class="row">
            <div class="col-md-6 call-to-action-col">
                <div class="call-to-action-services"><img src="/img/designlogo.png">
                    <h1><strong>Website Design</strong><br></h1>
                    <p>We base our designs on professional website design standards and templates. We make sure that our designs or modern and fresh so your brand looks and feels up to date.<br></p>
                </div>
            </div>
            <div class="col-md-6">
             
                
                    
                    
                            <tabs  bodyone = 'We believe in simple clean designs that promotes ease of use which leads to an awesome user experience.'
                                   bodytwo = 'Your branding & Logo is the identity of you business and is critical and in portraying your message to customers. '
                                  bodythree = "Having a website without strategy is like having a car without gasoline. It won’t go anywhere. We provide you with the tools to easily edit and maintain your website. Also coach you on SEO (Search Engine Optimization) and marketing on how to connect to more customers.  "
                                  title="WEBSITE DESIGN"
                                  titletwo = 'BRANDING & LOGO'
                                  titlethree='CONTENT STRATEGY'
                                 >
                                  
                                  </tabs>
                  
                  </div>

            </div>
      
        <div class="row">
            <div class="col-md-6">
                <tabs  
                bodyone = 'Sometimes a your business solution requires something more custom. That is no problem for us we can roll up our sleeves and code a solution to your specific needs. '
                bodytwo = 'We have great maintenance plans and packages to keep your website up to date with the latest technologies. '
                bodythree = ''
               title="BUILT FROM SCRATCH"
               titletwo = 'MAINTENANCE & UPDATES'
               titlethree=""
              >
               
               </tabs>

            </div>
            <div class="col-md-6 call-to-action-col">
                <div class="call-to-action-services-right"><img src="/img/code-icon.png">
                    <h1><strong>Website Development</strong><br></h1>
                    <p>We base our designs on professional website design standards and templates. We make sure that our designs or modern and fresh so your brand looks and feels up to date.<br></p>
                </div>
            </div>
        </div>
    </div>
    </div>
</div>

@endsection
