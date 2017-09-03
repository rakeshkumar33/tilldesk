@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Add an address so you can get paid</div>

                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                            @include('app.account.company._person')

                            @include('app.account.company._address_form')

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
