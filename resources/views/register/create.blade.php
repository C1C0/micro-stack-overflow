@extends('components.layout')

@section('content')
    <x-page-title>Register</x-page-title>
    <x-forms.form action="/register" method="POST" class="py-5">
        <x-forms.input name="username" />
        <x-forms.input name="email" placeholder="user@example.com"/>
        <x-forms.input name="password" type="password"/>
        <x-forms.submit label="Submit"/>
        <a href="/login" class="text-end text-dark d-block">Log In</a>
    </x-forms.form>
@endsection