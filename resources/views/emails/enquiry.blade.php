@component('mail::message')
# Hi

Here is your new enquiry:

Contact Name: {{$enquiry->name}}\
Entity Name: {{$enquiry->entityName}}\
Email: {{$enquiry->email}}\
Phone: {{$enquiry->phone}}\
Subject: {{$enquiry->subject}}\
Message: {{$enquiry->message}}

Thanks,<br>
{{ config('app.name') }}
@endcomponent
