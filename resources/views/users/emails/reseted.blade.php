@component('mail::message')
# Mot de passe modifiée ...

Email : {{ $user->email }}<br>
Date : {{ date('d-m-Y h:i:s') }}<br>

....

@component('mail::button', ['url' => url('/')])
Retour sur notre site web
@endcomponent

Merci,<br>
{{ config('app.name') }}
@endcomponent
