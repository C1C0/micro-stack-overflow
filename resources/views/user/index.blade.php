@extends('components.layout')

@section('content')
    <x-page-title>Your profile, {{ auth()->user()->username }}</x-page-title>
    <x-vue-app>
        <vue-profile :user="{{$user}}"></vue-profile>
    </x-vue-app>
@endsection