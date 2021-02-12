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
               <div class="card-header">Sukurkime Menu:</div>
               <div class="card-body">
                   <form action="{{ route('menu.store') }}" method="POST">
                       @csrf
                       <div class="form-group">
                           <label>Pavadinimas: </label>
                           <input type="text" name="title" class="form-control">
                       </div>
                       <div class="form-group">
                           <label>Kaina: </label>
                           <input type="number" name="price" class="form-control"> 
                       </div>
                       <div class="form-group">
                        <label>Svoris: </label>
                        <input type="number" name="weight" class="form-control"> 
                    </div>
                    <div class="form-group">
                        <label>Mėsos kiekis: </label>
                        <input type="number" name="amount_of_meat" class="form-control"> 
                    </div>
                       <div class="form-group">
                           <label>Aprašymas: </label>
                           <textarea id="mce" name="about" rows=10 cols=100 class="form-control"></textarea>
                       </div>
                       <button type="submit" class="btn btn-primary">Patvirtinti</button>
                   </form>
               </div>
           </div>
       </div>
   </div>
</div>
@endsection