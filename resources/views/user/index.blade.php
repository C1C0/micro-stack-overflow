@extends('components.layout')

@section('content')
    <x-vue-app>
{{--        @dd($user)--}}
        @if($editable)
            <x-page-title>Your profile, {{ auth()->user()->username }}</x-page-title>
            <vue-profile-editable :data="{{$user}}"></vue-profile-editable>
        @else
            <x-page-title>Profile of "{{ $user->username }}"</x-page-title>
            <vue-profile-common :user="{{$user}}"></vue-profile-common>
        @endif
    </x-vue-app>
@endsection