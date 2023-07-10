<x-mail::message>
# Hello

{{ $user->fullName }} has sent message.

<blockquote>

{!! $message->message !!}

</blockquote>

<x-mail::button :url="route('messaging.index')">
View Message
</x-mail::button>


Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
