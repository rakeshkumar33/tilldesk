@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-body">
            <h3 class="card-title">Contacts</h3>


            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif


            <a href="{{ url('/contacts/new') }}">New Contact</a>


            @if(count($data) > 0)
                @foreach($data as $item)
                    <div class="card">
                        <a href= {{ "/contacts/$item->id/edit" }} >Show</a>
                        <h3>{{ $item->name }}</h3>
                        <p>{{ $item->category }}</p>
                    </div>
                @endforeach

                {{ $data->links()  }}
            @else
                <p>No contacts found yet</p>
            @endif
        </div>
    </div>

@endsection
