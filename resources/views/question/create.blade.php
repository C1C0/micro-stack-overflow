@extends('components.layout')

@section('content')
    <x-page-title>What would you like to know ?</x-page-title>
    <x-forms.form action="/question" method="POST" class="py-5" enctype="multipart/form-data">
        <x-forms.input name="title"/>
        <x-forms.textarea name="body"/>
        <x-forms.input name="media" type="file"/>
        <x-forms.submit label="Submit"/>
    </x-forms.form>
@endsection