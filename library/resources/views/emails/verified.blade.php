@component('mail::message')
# Hello From CSED GP Library

Dear {{$user->name}},

Thank you for your registeration on CSED Graduation Project Library.
We have reviewed your information and would like for you to verify your email address by clicking on this this button :
@component('mail::button', ['url' => $url])
Activate
@endcomponent
If you received this email by mistake, simply ignore or delete it.
<br>
<br>
Thanks,<br>
{{ config('app.name') }}
@endcomponent
