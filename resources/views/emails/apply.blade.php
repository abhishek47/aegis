@component('mail::message')
# Job Application

*Name :* {{ $name }}

*E-Mail :* {{ $email }}

*Phone :* {{ $phone }}

*Post :* {{ $post }}

@component('mail::button', ['url' =>  $url ])
View Resume
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
