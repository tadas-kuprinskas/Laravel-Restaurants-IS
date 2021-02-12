@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header">Restoranas ir menu info</div>
    <div class="card-body">
        <h5>Pavadinimas: {{ $restaurant->title }}</h5>
        <h5>Klientai: {{ $restaurant->customers }}</h5>
        <h5>Darbuotojai: {{ $restaurant->employees }}</h5>
        <hr>
        <h5>Menu:  {{ $restaurant->menu->title }}</h5>
        {{-- <table class="table">
            <tr>
                <th>Miesto pavadinimas</th>
                <th>Populiacija</th>
            </tr>
            @foreach ($restaurant->menu->towns as $town)
            <tr>
                <th>{{ $town->title }}</th>
                <th>{{ $town->population }}</th>
            </tr>
            @endforeach
        </table> --}}
    </div>
</div>
@endsection
