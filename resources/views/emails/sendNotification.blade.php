<x-mail::message>
# Appointment Approved

Dear {{ $data['name'] }}
<br>
<br>
We hope this email finds you well. We are delighted to confirm your upcoming appointment at Sta. Maria Dental Clinic.
<br>
Your appointment for {{ $data['procedure'] }} is scheduled for {{ $data['datetime'] }}
<br>
Our team of dental experts is looking forward to providing you with exceptional care and service during your visit.
<br>
If you have any questions or need to make any adjustments to your appointment, please feel free to contact us at Tel No. 8668-1600 / 8546-0414 / Cel No. 0917-892-6273 or reply to this email.
<br>
<br>
Best regards,
<br>
Sta. Maria Dental Clinic
<br>
43 Camilo Osias Street New haven Village Novaliches Q.C.
<br>
Tel No. 8668-1600 / 8546-0414\nCel No. 0917-892-6273
<br>
Website: www.stamariadentalclinic.site



Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
