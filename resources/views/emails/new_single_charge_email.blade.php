@component('mail::message')


Congratulations,<br>
 {{$name}} charge has been added to your account for ${{$cost}}.
Please click <a href="{{route('dashboard')}}">here</a>  to login to your account and complete your purchase.

Kind Regards,<br>
WebField
@endcomponent
