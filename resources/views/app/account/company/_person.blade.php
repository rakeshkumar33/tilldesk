<div class="form-row">
    <div class="col">

        <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
            <label for="first_name" class="control-label">First name</label>


            <input id="first_name" type="text" class="form-control" name="first_name"  />

            @if ($errors->has('first_name'))
                <span class="help-block">
                                        <strong>{{ $errors->first('first_name') }}</strong>
                                    </span>
            @endif

        </div>
    </div>
    <div class="col">

        <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
            <label for="last_name" class="control-label">Last name</label>


            <input id="last_name" type="text" class="form-control" name="last_name"
                   value="{{ old('last_name') }}"  />

            @if ($errors->has('last_name'))
                <span class="help-block">
                                        <strong>{{ $errors->first('last_name') }}</strong>
                                    </span>
            @endif

        </div>
    </div>
</div>
