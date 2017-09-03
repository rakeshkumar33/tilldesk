<div class="form-group{{ $errors->has('contact_type') ? ' has-error' : '' }}">
    <label for="contact_type" class="control-label">Business type</label>

    <div class="form-check form-check-inline">
        <label class="contact_type_individual">
            <input class="form-check-input" type="radio" name="contact_type" id="contact_type_individual"
                   value="individual"> Individual
        </label>
    </div>
    <div class="form-check form-check-inline">
        <label class="contact_type_business">
            <input class="form-check-input" type="radio" name="contact_type" id="contact_type_business"
                   value="business"> Business
        </label>
    </div>

</div>


<div class="form-group{{ $errors->has('contact_business_name') ? ' has-error' : '' }}">
    <label for="contact_business_name" class="control-label">Business name</label>


    <input id="contact_business_name" type="text" class="form-control" name="contact_business_name"
           value="{{ old('contact_business_name') }}" required/>

    @if ($errors->has('contact_business_name'))
        <span class="help-block">
                                        <strong>{{ $errors->first('contact_business_name') }}</strong>
                                    </span>
    @endif

</div>