@extends('components.layout')

@section('content')
    <x-page-title>Edit question: "{{$question->title}}"</x-page-title>
    <x-forms.form action="/question/{{$question->id}}" method="POST" class="py-5" enctype="multipart/form-data">
        @method('PATCH')
        <x-forms.input name="title" :initValue="$question->title"/>
        <x-forms.textarea name="body" :initValue="$question->body"/>
        <x-forms.input name="media" type="file"/>
        <x-forms.submit label="Submit"/>
    </x-forms.form>
@endsection