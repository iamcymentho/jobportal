@component('mail::message')
Top of the day to you,



Hi ,{{ $data['friend_name'] }} , your friend {{ $data['your_name'] }} , {{ $data['your_email'] }} , refers you a job opportunity. 

Click the link below to  check it out

@component('mail::button', ['url' => $data['jobUrl']])
Click Here
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
