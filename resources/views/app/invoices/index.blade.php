@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-body">
            <h3 class="card-title">Invoices</h3>


            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif


            <a href="{{ url('/contacts/new') }}">New Invoice</a>



                <p>No contacts found yet</p>
        </div>
    </div>

@endsection
