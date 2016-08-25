<!-- select2 -->
<div @include('crud::inc.field_wrapper_attributes') >
    <label>{{ $field['label'] }}</label>
    <?php $entity_model = $crud->getModel();?>
    <div class="row">
        @foreach ($field['model']::all() as $connected_entity_entry)
            <div class="col-sm-4">
                <div class="checkbox">
                    <label>
                        <input type="checkbox"
                               name="{{ $field['name'] }}[]"
                               value="{{ $connected_entity_entry->id }}"
                        <?php
                                if (isset($entry) && json_decode($entry->specifics)):
                                    $results = array_filter(json_decode($entry->specifics), function ($specific) use ($connected_entity_entry) {
                                        return $specific == $connected_entity_entry->id;
                                    });
                                    if (!empty($results)): echo 'checked="checked"'; endif;
                                endif;
                        ?>
                        > {{ $connected_entity_entry->{$field['attribute']} }}
                    </label>
                </div>
            </div>
        @endforeach
    </div>
</div>