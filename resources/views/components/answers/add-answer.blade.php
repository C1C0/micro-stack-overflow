@props(['questionId'])

<div {{$attributes(['class' => "card"])}}>
    <div class="card-body">
        <div class="d-flex align-items-center justify-content-between card-title mb-4">
            <div class="d-flex flex-column">
                <h5>Contribute with your answer:</h5>
            </div>

        </div>
        <div class="card-text">
            <x-forms.form action="/question/{{$questionId}}/answer" method="POST">
                <x-forms.textarea name="body" label="Displayed Text" required></x-forms.textarea>
                <x-forms.submit label="Submit" />
            </x-forms.form>
        </div>
    </div>
</div>