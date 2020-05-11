@component('mail::message')
# Hello From CSED GP Library

Dear {{$user->name}},

Thank you for your registeration on CSED Graduation Project Library.
We have reviewed your information and we're sad to inform you that your information did not match any member of the faculty.
As a result your registration has been deleted. Below is your registeration information you can review it and register again by clicking on the button below.
<br>
Name : {{$user->name}}. <br>
E-mail : {{$user->email}}. <br>
Department : {{$user->department}}. <br>
Position : @if($user->isTS == 1) Teachinf staff @else Student @endif<br>
Graduation year : {{$user->graduation_year}}. <br>
National ID : {{$user->national_id}}. <br>

@component('mail::button', ['url' => $url])
Register
@endcomponent
If you received this email by mistake, simply ignore or delete it.
<br>
<br>
Thanks,<br>
{{ config('app.name') }}
@endcomponent
