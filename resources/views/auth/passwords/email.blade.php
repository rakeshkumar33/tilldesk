@extends('layouts.app')

@section('content')

    <div class="card">
        <div class="card-body">
            <h3 class="card-title">Reset your password</h3>




                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form class="" method="POST" action="{{ route('password.email') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="control-label">Email address</label>


                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif

                        </div>

                        <div class="form-group">

                                <button type="submit" class="btn btn-primary">
                                    Email instructions
                                </button>

                        </div>
                    </form>
                </div>
            </div>

@endsection
