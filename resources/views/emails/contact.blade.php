@component('mail::message')
# Contact Form Message

{{ $name }} says, 

{{ $message }}

*E-Mail:* {{ $email }}

@endcomponent