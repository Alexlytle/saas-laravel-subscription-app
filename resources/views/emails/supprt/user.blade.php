@component('mail::message')

Thank you {{$firstname}} for the email

First name: {{$firstname}} <br>
Last name: {{$lastname}}<br>
Email: {{$email}}<br>
Question:{{$question}}<br>

Kind Regards,<br>
WebField
@endcomponent
