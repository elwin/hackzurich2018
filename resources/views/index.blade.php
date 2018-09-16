@extends('master')

@section('content')
    <h1 class="mb-4">Measured safety of Streets</h1>
    <ul class="list-group">
        @foreach($streets as $street)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                {{ $street->name }}
                <span class="badge badge-primary badge-pill">{{ $street->score }}</span>
            </li>
        @endforeach
    </ul>
@endsection