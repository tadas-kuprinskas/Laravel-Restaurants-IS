@extends('layouts.app')
@section('content')
<div class="card-body">
    <img style="width:100%;" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSRMYY0g6VYoupzx9U_7aEQodfzzW2Q_HaRQw&usqp=CAU" alt="">
    <table class="table">
        <tr>
            <th>{{ __('msg.title') }}</th>
            <th>{{ __('msg.price') }}</th>
            <th>{{ __('msg.weight') }}</th>
            <th>{{ __('msg.amount_of_meat') }}</th>
            <th>{{ __('msg.description') }}</th>
            <th>{{ __('msg.actions') }}</th>
        </tr>
        @foreach ($menus as $menu)
        <tr>
            <td>{{ $menu->title }}</td>
            <td>{{ $menu->price }}</td>
            <td>{{ $menu->weight }}</td>
            <td>{{ $menu->amount_of_meat }}</td>
            <td>{!! $menu->about !!}</td>
            <td>
                <form action={{ route('menu.destroy', $menu->id) }} method="POST">
                    <a class="btn btn-success" href={{ route('menu.edit', $menu->id) }}>{{ __('msg.edit') }}</a>
                    @csrf @method('delete')
                    <input type="submit" class="btn btn-danger" value="{{ __('msg.delete') }}"/>
                </form>
            </td>

        </tr>
        @endforeach
    </table>
    <div>
        <a href="{{ route('menu.create') }}" class="btn btn-success">{{ __('msg.add') }}</a>
    </div>
</div>
@endsection
