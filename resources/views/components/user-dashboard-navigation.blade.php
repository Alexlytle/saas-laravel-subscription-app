  <div class="inner-card">
<div class="card">

    <ul class="list-group list-group-flush">
      <a href="{{route('dashboard')}}">
    <li  class="list-group-item @if (Route::currentRouteName()=='dashboard') highlight-dash @endif">
              Dashboard 
      </li>
  </a>

  <a href="{{route('showSimpleCharge',auth()->user()->id)}}">
    <li class="list-group-item  @if (Route::currentRouteName()=='showSimpleCharge') highlight-dash @endif"> 
            One Time Payments
    </li>
</a>
  <a href="{{route('show_plan',auth()->user()->id)}}">
    <li class="list-group-item @if (Route::currentRouteName()=='show_plan') highlight-dash @endif" >
             Monthly  Plans 
      </li>
  </a>
  {{-- <a href="{{route('show_subscriptions',auth()->user()->id)}}">
      <li class="list-group-item  @if (Route::currentRouteName()=='show_subscriptions') highlight-dash @endif" >
                 Paid Subscriptions 
        </li>
    </a> --}}
  <a href="{{route('update_payment',auth()->user()->id)}}">
      <li class="list-group-item   @if (Route::currentRouteName()=='update_payment') highlight-dash @endif" >
              Payment Method 
        </li>
    </a>
  {{-- <a href="{{route('show_invoices',auth()->user()->id)}}">
    <li class="list-group-item @if (Route::currentRouteName()=='show_invoices') highlight-dash @endif">
           Invoices 
    </li>
  </a> --}}
  <a href="{{route('show_support',auth()->user()->id)}}">
      <li class="list-group-item  @if (Route::currentRouteName()=='show_support') highlight-dash @endif">
                  Support
          </li>
  </a>
  <a href="{{route('show_profile',auth()->user()->id)}}">
      <li class="list-group-item  @if (Route::currentRouteName()=='show_profile') highlight-dash @endif"> 
              Profile 
      </li>
  </a>



  </ul>
  </div>
  
  </div>