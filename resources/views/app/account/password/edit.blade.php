@extends('layouts.app')

@section('content')

    <div class="card">
        <div class="card-body">
            <h3 class="card-title">Password</h3>

            <form class="" method="POST" action="{{ route('register') }}" autocomplete="off">
                {{ csrf_field() }}


                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label for="text" class="control-label">Business name</label>


                    <input id="email" type="text" class="form-control" name="email"
                           value="{{ old('email') }}" required autofocus/>

                    @if ($errors->has('email'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                    @endif

                </div>
                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label for="text" class="control-label">Business name</label>


                    <input id="email" type="text" class="form-control" name="email"
                           value="{{ old('email') }}" required autofocus/>

                    @if ($errors->has('email'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                    @endif

                </div>

                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label for="text" class="control-label">Business name</label>


                    <input id="email" type="text" class="form-control" name="email"
                           value="{{ old('email') }}" required autofocus/>

                    @if ($errors->has('email'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                    @endif

                </div>


                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label for="text" class="control-label">Business name</label>


                    <input id="email" type="text" class="form-control" name="email"
                           value="{{ old('email') }}" required autofocus/>

                    @if ($errors->has('email'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                    @endif

                </div>


                <div class="form-group">

                    <button type="submit" class="btn btn-primary">
                        Save changes
                    </button>
                </div>

            </form>
        </div>
    </div>

@endsection
