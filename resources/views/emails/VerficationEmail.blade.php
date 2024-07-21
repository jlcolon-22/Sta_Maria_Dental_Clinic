<x-mail::message>
# Account Verification


<x-mail::button :url="$link">
VERIFY YOUR ACCOUNT
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
