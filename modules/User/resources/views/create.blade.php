@extends('layouts.backoffice')
@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">BIỂU MẪU TẠO NGƯỜI DÙNG</h3>
    </div>
    <div class="card-body">
        <form autocomplete='off' action={{ route('users.create') }} method="POST" novalidate="novalidate">
            @csrf
            <div class="row">
                <x-forms.input name="fullname" label='{{ __("User::translates.create_form.fullname") }}' type="text" placeholder='{{ __("User::translates.create_form.placeholder_fullname") }}' />
                <x-forms.input name="username" label='{{ __("User::translates.create_form.username") }}' type="text" placeholder='{{ __("User::translates.create_form.placeholder_username") }}' />
                <x-forms.input name="email" label='{{ __("User::translates.create_form.email") }}' type="text" placeholder='{{ __("User::translates.create_form.placeholder_email") }}' />
                <x-forms.select name="group_id" label='{{ __("User::translates.create_form.group_id") }}' :options="$groups" />
                <x-forms.input name="password" label='{{ __("User::translates.create_form.password") }}' type="password" placeholder='{{ __("User::translates.create_form.placeholder_password") }}' />
            </div>
            <x-forms.button type="submit" color="primary" size="lg" label='{{ __("User::translates.create_button") }}' />
            <a href="{{ route('users.index') }}" class="btn btn-danger btn-lg">{{ __("User::translates.create_cancel_button") }}</a>
        </form>
    </div>
</div>
@endsection