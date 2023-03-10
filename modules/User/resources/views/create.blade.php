@extends('layouts.backoffice')
@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">BIỂU MẪU TẠO NGƯỜI DÙNG</h3>
    </div>
    <div class="card-body">
        <form autocomplete='off'>
            @csrf
            @method('POST')
            <div class="row">
                <x-forms.input name="fullname" label="HỌ VÀ TÊN" type="text" placeholder="Please enter full name..." />
                <x-forms.input name="username" label="TÊN TÀI KHOẢN" type="text" placeholder="Please enter username..." />
                <x-forms.input name="email" label="EMAIL" type="text" placeholder="Please enter email..." />
                <x-forms.select name="group" label="VAI TRÒ" :options="$groups" />
                <x-forms.input name="password" label="MẬT KHẨU" type="password" placeholder="Please enter password..." />
            </div>
            <x-forms.button type="submit" color="primary" size="lg" label="TẠO NGƯỜI DÙNG" />
            <x-forms.button type="reset" color="danger" size="lg" label="HỦY BỎ" />
        </form>
    </div>
</div>
@endsection