<x-mail::message>
# Reset Password Request

We've received your request to reset your password.
<br>
To reset, simply click the reset password button.

<x-mail::button :url="$link">
Reset Password Now
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
