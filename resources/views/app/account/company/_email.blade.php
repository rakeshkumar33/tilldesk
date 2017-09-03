<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
    <label for="email" class="control-label">Email address</label>


    <input id="email" type="email" class="form-control" name="email" required/>

    @if ($errors->has('email'))
        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
    @endif

</div>