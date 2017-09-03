@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                        <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                            {{ csrf_field() }}

                            <div class="form-group">
                                <label for="person">
                                    <input type="radio" name="category" value="person" id="person" />
                                </label>

                                <label for="business">
                                    <input type="radio" name="category" value="business" id="business" />
                                </label>

                            </div>
                        </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
