@extends('layouts.app')

@section('content')






    <div class="card">
        <div class="card-body">
            <h3 class="card-title">My profile</h3>


            <form class="" method="POST" action="{{ url('/settings/profile') }}" autocomplete="off">
                {{ csrf_field() }}


                @include('app.account.company._person', ['hasEmail' => false, 'hasPhone' => false])




                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label for="email" class="control-label">Email address</label>


                    <input
                            id="email"
                            type="email"
                            class="form-control"
                            name="email"
                            value="{{ $data->email ? $data->email : old('email') }}"/>


                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif

                </div>


                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label for="timezone" class="control-label">Time zone</label>


                    <select name="timezone" id="timezone" class="form-control" required>
                        <option value="">Pick your timezone</option>
                        @foreach (timezone_identifiers_list() as $timezone)
                            <option value="{{ $timezone }}"{{ $timezone == old('timezone') ? ' selected' : '' }}>{{ $timezone }}</option>
                        @endforeach
                    </select>


                    @if ($errors->has('timezone'))
                        <span class="help-block">
                            <strong>{{ $errors->first('timezone') }}</strong>
                        </span>
                    @endif

                </div>


                <div class="form-group{{ $errors->has('first_week_day') ? ' has-error' : '' }}">
                    <label for="first_week_day" class="control-label">First day of the week</label>


                    <input id="first_week_day" type="text" class="form-control" name="first_week_day"
                           value="{{ old('first_week_day') }}" required/>

                    @if ($errors->has('first_week_day'))
                        <span class="help-block">
                            <strong>{{ $errors->first('first_week_day') }}</strong>
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


@endsection
