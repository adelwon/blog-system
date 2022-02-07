@component('mail::message')
    Hello, {{ $name }} ;)

    Your password: {{ $password }}

    Thanks,
    {{ config('app.name') }}
@endcomponent
