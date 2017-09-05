<div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
    <label for="phone" class="control-label">Phone number</label>


    <input id="phone" type="tel" class="form-control" name="phone" />

    @if ($errors->has('phone'))
        <span class="help-block">
            <strong>{{ $errors->first('phone') }}</strong>
        </span>
    @endif

</div>