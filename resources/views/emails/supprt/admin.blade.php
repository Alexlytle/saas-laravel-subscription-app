@component('mail::message')


Thank you {{$firstname}} we have received your message 

First name: {{$firstname}} <br>
Last name: {{$lastname}}<br>
Email: {{$email}}<br>
Question:{{$question}}<br>

Kind Regards,<br>
WebField
@endcomponent
