@extends('layouts.app')
@section('content')
<div class="card-body">
    <div class="card-body">
        <form class="form-inline" action="{{ route('restaurant.index') }}" method="GET">
            <select name="menu_id" id="" class="form-control">
                <option value="" selected disabled>Filtruoti pagal menu</option>
                @foreach ($menus as $menu)
                <option value="{{ $menu->id }}" 
                    @if($menu->id == app('request')->input('menu_id')) 
                        selected="selected" 
                    @endif>{{ $menu->title }}</option>
                @endforeach
            </select>
            <button type="submit" class="btn btn-primary">Patvirtinti</button>
            <a class="btn btn-success" href={{ route('restaurant.index') }}>Rodyti visus</a>

            <div class="mx-auto pl-5">

                <span class="input-group-btn mr-3">
                    <button class="btn btn-info" type="submit" title="Search town">
                        <span class="fas fa-search">&#128270;</span>
                    </button>
                </span>

                <input type="text" class="form-control mr-3" name="search" placeholder="Ieškoti" id="search">

                <a href="{{ route('restaurant.index') }}" >
                    <span class="input-group-btn">
                        <button class="btn btn-danger" type="button" title="Refresh page">
                            <span class="fas fa-sync-alt">&#128472;</span>
                        </button>
                    </span>
                </a>

            </div>
        </form>
    </div>
    

    <table class="table">
        <tr>
            <th>Pavadinimas</th>
            <th>Klientai</th>
            <th>Darbuotojai</th>
            <th>Menu</th>
            <th>Veiksmai</th>
        </tr>
        @foreach ($restaurants as $restaurant)
        <tr>
            <td>{{ $restaurant->title }}</td>
            <td>{{ $restaurant->customers }}</td>
            <td>{{ $restaurant->employees }}</td>
            <td>{{ $restaurant->menu->title }}</td>
            <td>
                <form action={{ route('restaurant.destroy', $restaurant->id) }} method="POST">
                    <a class="btn btn-success" href={{ route('restaurant.edit', $restaurant->id) }}>Redaguoti</a>
                    @csrf @method('delete')
                    <input type="submit" class="btn btn-danger" value="Trinti"/>
                    <a href="{{ route('restaurant.details', $restaurant->id) }}" class="btn btn-primary m-1">Peržiūrėti detales</a>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    <div>
        <a href="{{ route('restaurant.create') }}" class="btn btn-success">Pridėti</a>
    </div>
</div>
@endsection
