@extends('layouts.app')

@section('content')

<div class="hero-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-xl-12 text-center">
                <h1>Website Applications</h1>
                <p><strong>Learn the difference between Web Design and Web Applications.</strong></p>
            </div>
        </div>
    </div>
</div>
        <div class="app-wrapper">
                <div class="container webservice-apps">
            
                        <div class="row">
                                <div class="col-md-6">
                                    <h2>Website Design</h2>
                                    <p>
                                        Webfield defines this style of websites as “static” or “brochure websites”.The most popular tool for web design is called wordpress which is defined as a “Content Management System”. The focus is more on design than functionality. Its purpose is to publicize written text and images. You can think of this as a digital newspaper. The beauty of using website design software is that it's easy to login and make edits. Drag and drop page builders and form builders  make the process intuitive to create, update, delete content. Functionality such as email contact forms and basic ecommerce can be accomplished but the more functionality you need the harder it will be to incorporate into your website.
                                    </p> 
                                </div>
                                <div class="col-md-6">
                                    <h2>Website Applications</h2>
                                    <p>
                                        A web framework like laravel is designed for rapid development and can scale very easily. Ensuring you will never find yourself outgrowing your current solution. Performance and security will be top notch. The drawbacks will be that the WYSIWYG ( “What You See Is What You Get”) experience will not be the same and the initial cost will be higher since everything has to be coded by hand. Future scaling of the application will be less expensive and will have the systems in place to do so efficiently. 
                                    </p>
                                </div>
                                <div class="col-md-12">
                                  <h2>How to decide if you need a Website Application?</h2>
                                  <p> More functionality you need the more problems you will encounter using a CMS (content management system). For example let's say you have a wordpress website and you want to start selling products.  Okay, no problem, you can install the woocommerce plugin which will turn your website into an e-commerce website (electronically buying or selling of products on online services). Then a week later you need the ability to have customers login and download invoices . As time goes on you may need a cool slider or a way to collect additional information during the checkout process. All of these features require plugins. So what's the problem with that?? Well each plugin will use a javascript library. A popular one is “Jquery '' for wordpress development. This is a good size library that takes up space on your website. The problem: plugin A doesn't know what plugin B is using for a library. This will lead to multiple libraries loading at the same time, slowing down your website and leading to bad SEO( search engine optimization). Even worse your website may completely break leading to what is known as the “White screen of death”. The solution for this is custom website development. If you find yourself growing a wordpress website  you can do custom plugin development ensuring the additional features work well with the other plugins. Creating custom wordpress plugins is very time consuming and does not have the architecture for coding as easily as a web framework that is designed to handle such tasks. A  web framework like laravel is designed for rapid development and can scale very easily. Ensuring you will never find yourself outgrowing your current solution.  </p>
                               
                                </div>
                               
                              
                        </div>
                </div>
        </div>
</div>

@endsection
