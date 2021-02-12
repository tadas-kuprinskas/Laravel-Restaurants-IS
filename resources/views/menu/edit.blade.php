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
                <div class="card-header">Pakeiskime Menu informaciją</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('menu.update', $menu->id) }}">
                        @csrf @method("PUT")
                        <div class="form-group">
                            <label for="">Pavadinimas</label>
                            <input type="text" name="title" class="form-control" value="{{ $menu->title }}">
                        </div>
                        <div class="form-group">
                            <label for="">Kaina</label>
                            <input type="text" name="price" class="form-control" value="{{ $menu->price }}">
                        </div>
                        <div class="form-group">
                            <label for="">Svoris</label>
                            <input type="text" name="weight" class="form-control" value="{{ $menu->weight }}">
                        </div>
                        <div class="form-group">
                            <label for="">Mėsos kiekis</label>
                            <input type="text" name="amount_of_meat" class="form-control" value="{{ $menu->amount_of_meat }}">
                        </div>
                        <div class="form-group">
                            <label for="">Aprašas</label>
                            <textarea id="mce" type="text" name="about" rows=10 cols=100 class="form-control">{!! $menu->about !!}</textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Pakeisti</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
