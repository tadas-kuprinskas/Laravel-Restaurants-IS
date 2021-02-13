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
               <div class="card-header">{{ __('msg.create') }}</div>
               <div class="card-body">
                   <form action="{{ route('menu.store') }}" method="POST">
                       @csrf
                       <div class="form-group">
                           <label>{{ __('msg.title') }}: </label>
                           <input type="text" name="title" value="{{old('title')}}" class="form-control">
                       </div>
                       <div class="form-group">
                           <label>{{ __('msg.price') }}: </label>
                           <input type="number" name="price" value="{{old('price')}}" class="form-control"> 
                       </div>
                       <div class="form-group">
                        <label>{{ __('msg.weight') }}: </label>
                        <input type="number" name="weight" value="{{old('weight')}}" class="form-control"> 
                    </div>
                    <div class="form-group">
                        <label>{{ __('msg.amount_of_meat') }}: </label>
                        <input type="number" name="amount_of_meat" value="{{old('amount_of_meat')}}" class="form-control"> 
                    </div>
                       <div class="form-group">
                           <label>{{ __('msg.description') }}: </label>
                           <textarea id="mce" name="about" rows=10 cols=100 class="form-control"></textarea>
                       </div>
                       <button type="submit" class="btn btn-primary">{{ __('msg.submit') }}</button>
                   </form>
               </div>
           </div>
       </div>
   </div>
</div>
@endsection
