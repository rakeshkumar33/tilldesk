@extends('layouts.app')

@section('content')


    <div class="card">
        <div class="card-body">
            <h3 class="card-title">Account</h3>


                <form action="{{ url('/settings/company') }}" method="POST"  autocomplete="off">
                    {{ csrf_field() }}




                    @include('app.account.company._contact')

                    @include('app.account.company._person')

                    @include('app.account.company._email')
                    @include('app.account.company._phone')


                    @include('app.account.company._address')

                    <div class="form-group">

                        <button type="submit" class="btn btn-primary">
                            Save changes
                        </button>
                    </div>

                </form>
        </div>
    </div>

@endsection
