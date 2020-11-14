<?php
/** @var \App\Account\Country $country_id */
$current_country = \App\Account\Country::find($country_id);
$governorates = \App\Account\Governorate::Where('country_id', $current_country->id)->get();
$old_gover_id = old('governorate_id', $governorates->first()->id);
$current_ciyies = \App\Account\City::where('government_id', ($current_governorate_id ?? null))->get();
if ($current_ciyies->count() > 0)
    $selected_cities = $current_ciyies;
else
    $selected_cities = \App\Account\City::Where('government_id', $old_gover_id)->get();

$cities = \App\Account\City::all();
?>

<div class="form-group row">
    <label class="col-sm-2 col-form-label text-right">Governorate</label>
    <div class="col-sm-4">
        <select class="form-control governorate_select" name="governorate_id">
            @foreach($governorates as $gover_i)
                <option
                    {{ ($gover_i->id == old('governorate_id',( $current_governorate_id ?? NULL ))) ? 'selected':'' }} value="{{ $gover_i->id }}">
                    {{ $gover_i->name }}
                </option>
            @endforeach
        </select>
        @include("GeneralComponents.error_message",['error'=>'status'])
    </div>
    <label class="col-sm-2 col-form-label text-right">City</label>
    <div class="col-sm-4">
        <select class="form-control cities_select_class" name="city_id">
            @foreach($selected_cities as $city_i)
                <option
                    {{ ($city_i->id == old('city_id',( $current_city_id ?? null ))) ? 'selected':'' }} value="{{ $city_i->id }}">
                    {{ $city_i->name }}
                </option>
            @endforeach
        </select>
        @include("GeneralComponents.error_message",['error'=>'Shop_categories_list_id'])
    </div>
</div>

@push('scripts_stack')
    <script>
        var all_cities = @json($cities);
        $(".governorate_select").change(function () {
            $('.cities_select_class').children().remove();
            let gov_id = $(this).val();
            // debugger;
            for (let i = 0; i < all_cities.length; i++) {
                let city_i = all_cities[i];
                if (city_i['government_id'] == gov_id) {
                    let city_i_el = $(`<option value="${city_i['id']}"> ${city_i['name']} </option>`);
                    $('.cities_select_class').append(city_i_el);
                }
            }
        });
    </script>
@endpush

