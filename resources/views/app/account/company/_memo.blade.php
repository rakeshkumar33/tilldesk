<div class="form-group{{ $errors->has('memo') ? ' has-error' : '' }}">
    <label for="memo" class="control-label">Notes</label>


    <textarea id="memo" class="form-control" name="memo" required></textarea>

    @if ($errors->has('memo'))
        <span class="help-block">
                                        <strong>{{ $errors->first('memo') }}</strong>
                                    </span>
    @endif

</div>