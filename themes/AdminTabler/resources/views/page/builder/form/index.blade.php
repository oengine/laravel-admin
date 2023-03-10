<div class="row">
    @foreach ($fields as $field)
        <div class="col-md-6 col-xl-6">
            {!! field_builder($field, $form) !!}
        </div>
    @endforeach
</div>
