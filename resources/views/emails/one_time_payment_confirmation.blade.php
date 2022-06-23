@component('mail::message')


Congratulations,<br> you have succesfully purchased {{$name}} for {{$cost}}
Please click <a href="{{route('dashboard')}}">here</a>  if you would like to view your account.

Kind Regards,<br>
WebField
@endcomponent
