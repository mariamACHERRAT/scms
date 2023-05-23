@component('mail::message')
# Welcome to the system

You have been added to the system as a student.

Here are your login credentials:

- Email: {{ $user->email }}
- Password: {{ $password }}

Please login to the system using the credentials above.

Thank you,<br>
{{ config('app.name') }}
@endcomponent
