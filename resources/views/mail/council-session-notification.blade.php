@component('mail::message')
# {{ __('messages.council_sessions') }}

{{ __('messages.council_session_notification_intro') }}

**{{ $session->title }}**

- {{ __('messages.budget_year') }}: {{ $session->session_date->translatedFormat('d F Y') }}
- {{ __('messages.council_type_' . $session->type) }}
@if($session->committee_name)
- {{ __('messages.committee') }}: {{ $session->committee_name }}
@endif

{{ __('messages.council_session_notification_footer') }}
@endcomponent