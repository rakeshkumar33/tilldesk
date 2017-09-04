<div class="form-group{{ $errors->has('line_1') ? ' has-error' : '' }}">
    <label for="line_1" class="control-label">Address 1</label>


    <input id="line_1" type="text" class="form-control" name="line_1" />

    @if ($errors->has('line_1'))
        <span class="help-block">
                                        <strong>{{ $errors->first('line_1') }}</strong>
                                    </span>
    @endif

</div>

<div class="form-group{{ $errors->has('line_2') ? ' has-error' : '' }}">
    <label for="line_2" class="control-label">Address 2</label>


    <input id="line_2" type="text" class="form-control" name="line_2"
           value="{{ old('line_2') }}" />

    @if ($errors->has('line_2'))
        <span class="help-block">
                                        <strong>{{ $errors->first('line_2') }}</strong>
                                    </span>
    @endif

</div>


<div class="form-row">
    <div class="col">

        <div class="form-group{{ $errors->has('city') ? ' has-error' : '' }}">
            <label for="city" class="control-label">City</label>


            <input id="city" type="text" class="form-control" name="city" />

            @if ($errors->has('city'))
                <span class="help-block">
                                        <strong>{{ $errors->first('city') }}</strong>
                                    </span>
            @endif

        </div>
    </div>

    <div class="col">

        <div class="form-group{{ $errors->has('zip_code') ? ' has-error' : '' }}">
            <label for="zip_code" class="control-label">ZIP/Postal Code</label>


            <input id="zip_code" type="text" class="form-control" name="zip_code"
                   value="{{ old('zip_code') }}" />

            @if ($errors->has('zip_code'))
                <span class="help-block">
                                        <strong>{{ $errors->first('zip_code') }}</strong>
                                    </span>
            @endif

        </div>
    </div>


</div>

<div class="form-row">
    <div class="col">

        <div class="form-group{{ $errors->has('country') ? ' has-error' : '' }}">
            <label for="country" class="control-label">Country</label>


            <input id="country" type="text" class="form-control" name="country" />

            @if ($errors->has('country'))
                <span class="help-block">
                                        <strong>{{ $errors->first('country') }}</strong>
                                    </span>
            @endif

        </div>
    </div>

    <div class="col">

        <div class="form-group{{ $errors->has('state') ? ' has-error' : '' }}">
            <label for="state" class="control-label">State</label>


            <input id="state" type="text" class="form-control" name="state"
                   value="{{ old('state') }}" />

            @if ($errors->has('state'))
                <span class="help-block">
                                        <strong>{{ $errors->first('state') }}</strong>
                                    </span>
            @endif

        </div>
    </div>
</div>