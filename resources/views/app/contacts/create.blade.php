@extends('layouts.app')

@section('content')


    <div class="card">
        <div class="card-body">
            <h3 class="card-title">Add Contact</h3>
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif


            <form class="" method="POST" action="{{ url('contacts') }}" autocomplete="off">
                {{ csrf_field() }}


                @include('app.account.company._contact')


                @include('app.account.company._person')


                @include('app.account.company._address')


                @include('app.account.company._memo')


                <div class="form-group">

                    <button type="submit" class="btn btn-primary">
                        Save changes
                    </button>
                </div>

            </form>

        </div>
    </div>



@endsection
