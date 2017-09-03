@extends('layouts.app')

@section('content')

    <div class="card">
        <div class="card-body">
            <h3 class="card-title">My profile</h3>


            <form class="" method="POST" action="{{ route('register') }}" autocomplete="off">
                {{ csrf_field() }}


                @include('app.account.company._person')



                <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                    <label for="title" class="control-label">Title</label>


                    <input id="title" type="text" class="form-control" name="title"
                           value="{{ old('title') }}" required/>

                    @if ($errors->has('title'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                    @endif

                </div>


                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label for="email" class="control-label">Email address</label>


                    <input id="email" type="email" class="form-control" name="email"
                           value="{{ old('email') }}" required/>

                    @if ($errors->has('email'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                    @endif

                </div>


                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label for="timezone" class="control-label">Time zone</label>


                    <input id="timezone" type="text" class="form-control" name="timezone"
                           value="{{ old('timezone') }}" required/>

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
