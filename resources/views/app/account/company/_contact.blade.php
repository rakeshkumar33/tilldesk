<div class="form-group{{ $errors->has('type') ? ' has-error' : '' }}">
    <label for="type" class="control-label">Business type</label>

    <div class="form-check form-check-inline">
        <label class="contact_type_individual">


            <input
                    type="radio"
                    class="form-check-input"
                    id="contact_type_individual"
                    name="type"
                    value="individual"
                    {{ isset($data->category) && $data->category == 'individual' ? 'checked' : null }}
            />

            Individual

        </label>
    </div>
    <div class="form-check form-check-inline">
        <label class="contact_type_business">

            <input
                    type="radio"
                    class="form-check-input"
                    id="contact_type_business"
                    name="type"
                    value="business"
                    {{ isset($data->category) && $data->category == 'business' ? 'checked' : null }} />

            Business
        </label>
    </div>

</div>


<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
    <label for="name" class="control-label">Business name</label>


    <input id="name" type="text" class="form-control" name="name"
           value="{{ isset($data->name) && $data->name ? $data->name : old('name') }}" />

    @if ($errors->has('name'))
        <span class="help-block">
            <strong>{{ $errors->first('name') }}</strong>
        </span>
    @endif

</div>