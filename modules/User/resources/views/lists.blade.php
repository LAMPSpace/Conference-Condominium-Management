@extends('layouts.client')

@section('title', 'Danh sách người dùng')
@section('content')
    <h1>{{ __('User::custom.title') }}</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Created at</th>
                <th>Updated at</th>
            </tr>
        </thead>
    </table>
@endsection