@component('mail::message')


Congratulations,<br>
 {{$plan_name}} has been added to your account. For ${{$plan_price}} monthly.
Please click <a href="{{route('dashboard')}}">here</a>  to login to your account and complete your purchase.

Kind Regards,<br>
WebField
@endcomponent
