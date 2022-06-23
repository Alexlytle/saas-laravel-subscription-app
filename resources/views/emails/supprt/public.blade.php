@component('mail::message')


New message from {{$firstname}}

First name: {{$firstname}} <br>
Last name: {{$lastname}}<br>
Email: {{$email}}<br>
Question:{{$question}}<br>

Kind Regards,<br>
WebField
@endcomponent
