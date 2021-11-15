@extends('components.layout')

@section('content')
    <x-page-title>Your profile, {{ auth()->user()->username }}</x-page-title>
@endsection