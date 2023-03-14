@if ($user->email_verified_at)
    <span class="badge badge-success">{{ __('User::translates.active') }}</span>
@else
    <span class="badge badge-danger">{{ __('User::translates.inactive') }}</span>
@endif