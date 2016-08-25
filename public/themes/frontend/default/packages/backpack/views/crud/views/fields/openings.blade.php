<!-- field_type_name -->
<div class="form-group col-md-12">
    <h3>Öffnungszeiten</h3>
    @if(isset($entry) && $entry->openings)
        @foreach($field['openings'] as $key => $opening)
            <h4>{{ $opening['name'] }}</h4>
            <div class="row">
                <div class="col-md-6">
                    <label>Geöffnet</label>
                    <input name="openings[opening][{{ $key }}]" value="{{ json_decode($entry->openings)->openings->$key }}" class="form-control">
                </div>
                <div class="col-md-6">
                    <label>Geschlossen</label>
                    <input name="openings[closing][{{ $key }}]" value="{{ json_decode($entry->openings)->closings->$key }}" class="form-control">
                </div>
            </div>
        @endforeach
    @else
        @foreach($field['openings'] as $key => $opening)

            <h4>{{ $opening['name'] }}</h4>
            <div class="row">
                <div class="col-md-6">
                    <label>Geöffnet</label>
                    <input name="openings[opening][{{ $key }}]" value="" class="form-control">
                </div>
                <div class="col-md-6">
                    <label>Geschlossen</label>
                    <input name="openings[closing][{{ $key }}]" value="" class="form-control">
                </div>
            </div>
        @endforeach
    @endif
    @if (isset($field['hint']))
        <p class="help-block">{!! $field['hint'] !!}</p>
    @endif
</div>


@if ($crud->checkIfFieldIsFirstOfItsType($field, $fields))
    {{-- FIELD EXTRA CSS  --}}
    {{-- push things in the after_styles section --}}

    @push('crud_fields_styles')
    <!-- no styles -->
    @endpush


    {{-- FIELD EXTRA JS --}}
    {{-- push things in the after_scripts section --}}

    @push('crud_fields_scripts')
    <!-- no scripts -->
    @endpush
@endif

{{-- Note: most of the times you'll want to use @if ($crud->checkIfFieldIsFirstOfItsType($field, $fields)) to only load CSS/JS once, even though there are multiple instances of it. --}}