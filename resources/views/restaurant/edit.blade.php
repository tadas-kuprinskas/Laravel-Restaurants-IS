@extends('layouts.app')
@section('content')
<div class="container">
    @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Pakeiskime restorano informaciją</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('restaurant.update', $restaurant->id) }}">
                        @csrf @method("PUT")
                        <div class="form-group">
                            <label for="">Pavadinimas: </label>
                            <input type="text" name="title" class="form-control" value="{{ $restaurant->title }}">
                        </div>
                        <div class="form-group">
                            <label for="">Klientai: </label>
                            <input type="number" name="customers" class="form-control" value="{{ $restaurant->customers }}">
                        </div>
                        <div class="form-group">
                            <label for="">Darbuotojai: </label>
                            <input type="number" name="employees" class="form-control" value="{{ $restaurant->employees }}">
                        </div>
                        <div class="form-group">
                            <label>Menu: </label>
                            <select name="menu_id" id="" class="form-control">
                                @foreach ($menus as $menu)
                                <option value="{{ $menu->id }}" @if($menu->id == $restaurant->menu_id) selected="selected" @endif>{{ $menu->title }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Pakeisti</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
