@extends('layouts.app')
@section('content')
<div class="card-body">
    <img src="https://www.sebarena.lt/media/renters/slides/restoranas11.jpg" alt="">
    <div class="card-body">
        <form class="form-inline" action="{{ route('restaurant.index') }}" method="GET">
            <select name="menu_id" id="" class="form-control">
                <option value="" selected disabled>{{ __('msg.filter_by_menu') }}</option>
                @foreach ($menus as $menu)
                <option value="{{ $menu->id }}" 
                    @if($menu->id == app('request')->input('menu_id')) 
                        selected="selected" 
                    @endif>{{ $menu->title }}</option>
                @endforeach
            </select>
            <button type="submit" class="btn mx-2 btn-primary">{{ __('msg.submit') }}</button>
            <a class="btn btn-success" href={{ route('restaurant.index') }}>{{ __('msg.show_all') }}</a>

            <div class="mx-auto pl-5">

                <span class="input-group-btn mr-3">
                    <button class="btn btn-info" type="submit" title="Search town">
                        <span class="fas fa-search"></span>
                    </button>
                </span>

                <input type="text" class="form-control mr-3" name="search" placeholder="{{ __('msg.search') }}" id="search">

                <a href="{{ route('restaurant.index') }}" >
                    <span class="input-group-btn">
                        <button class="btn btn-danger" type="button" title="Refresh page">
                            <span class="fas fa-sync-alt"></span>
                        </button>
                    </span>
                </a>

            </div>
        </form>
    </div>
    

    <table class="table">
        <tr>
            <th>{{ __('msg.title') }}</th>
            <th>{{ __('msg.customers') }}</th>
            <th>{{ __('msg.employees') }}</th>
            <th>{{ __('msg.menu') }}</th>
            <th>{{ __('msg.actions') }}</th>
        </tr>
        @foreach ($restaurants as $restaurant)
        <tr>
            <td>{{ $restaurant->title }}</td>
            <td>{{ $restaurant->customers }}</td>
            <td>{{ $restaurant->employees }}</td>
            <td>{{ $restaurant->menu->title }}</td>
            <td>
                <form action={{ route('restaurant.destroy', $restaurant->id) }} method="POST">
                    <a class="btn btn-success" href={{ route('restaurant.edit', $restaurant->id) }}>{{ __('msg.edit') }}</a>
                    @csrf @method('delete')
                    <input type="submit" class="btn btn-danger" value="{{ __('msg.delete') }}"/>
                    <a href="{{ route('restaurant.details', $restaurant->id) }}" class="btn btn-primary m-1">{{ __('msg.info') }}</a>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    <div>
        <a href="{{ route('restaurant.create') }}" class="btn btn-success">{{ __('msg.add') }}</a>
    </div>
</div>
@endsection
