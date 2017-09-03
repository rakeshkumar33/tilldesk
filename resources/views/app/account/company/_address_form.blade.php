<div class="form-group{{ $errors->has('address_line_1') ? ' has-error' : '' }}">
    <label for="address_line_1" class="control-label">Address 1</label>


    <input id="address_line_1" type="text" class="form-control" name="address_line_1" required>

    @if ($errors->has('address_line_1'))
        <span class="help-block">
                                        <strong>{{ $errors->first('address_line_1') }}</strong>
                                    </span>
    @endif

</div>

<div class="form-group{{ $errors->has('address_line_2') ? ' has-error' : '' }}">
    <label for="address_line_2" class="control-label">Address 2</label>


    <input id="address_line_2" type="text" class="form-control" name="address_line_2"
           value="{{ old('address_line_2') }}" required>

    @if ($errors->has('address_line_2'))
        <span class="help-block">
                                        <strong>{{ $errors->first('address_line_2') }}</strong>
                                    </span>
    @endif

</div>


<div class="form-row">
    <div class="col">

        <div class="form-group{{ $errors->has('address_city') ? ' has-error' : '' }}">
            <label for="address_city" class="control-label">City</label>


            <input id="address_city" type="text" class="form-control" name="address_city" required>

            @if ($errors->has('address_city'))
                <span class="help-block">
                                        <strong>{{ $errors->first('address_city') }}</strong>
                                    </span>
            @endif

        </div>
    </div>

    <div class="col">

        <div class="form-group{{ $errors->has('address_zip_code') ? ' has-error' : '' }}">
            <label for="address_zip_code" class="control-label">ZIP/Postal Code</label>


            <input id="address_zip_code" type="text" class="form-control" name="address_zip_code"
                   value="{{ old('address_zip_code') }}" required>

            @if ($errors->has('address_zip_code'))
                <span class="help-block">
                                        <strong>{{ $errors->first('address_zip_code') }}</strong>
                                    </span>
            @endif

        </div>
    </div>


</div>

<div class="form-row">
    <div class="col">

        <div class="form-group{{ $errors->has('address_country') ? ' has-error' : '' }}">
            <label for="address_country" class="control-label">Country</label>


            <input id="address_country" type="text" class="form-control" name="address_country" required>

            @if ($errors->has('address_country'))
                <span class="help-block">
                                        <strong>{{ $errors->first('address_country') }}</strong>
                                    </span>
            @endif

        </div>
    </div>

    <div class="col">

        <div class="form-group{{ $errors->has('address_state') ? ' has-error' : '' }}">
            <label for="address_state" class="control-label">State</label>


            <input id="address_state" type="text" class="form-control" name="address_state"
                   value="{{ old('address_state') }}" required>

            @if ($errors->has('address_state'))
                <span class="help-block">
                                        <strong>{{ $errors->first('address_state') }}</strong>
                                    </span>
            @endif

        </div>
    </div>
</div>