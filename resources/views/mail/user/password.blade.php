@component('mail::message')
    Hello, {{ $name }} ;)

    Your password: {{ $password }}

    Thanks,<br>
    {{ config('app.name') }}
@endcomponent
