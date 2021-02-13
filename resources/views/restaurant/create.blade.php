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
               <div class="card-header">{{ __('msg.add') }}</div>
               <div class="card-body">
                   <form action="{{ route('restaurant.store') }}" method="POST">
                       @csrf
                       <div class="form-group">
                            <label for="">{{ __('msg.title') }}: </label>
                            <input type="text" name="title" value="{{old('title')}}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">{{ __('msg.customers') }}: </label>
                            <input type="number" name="customers" value="{{old('customers')}}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">{{ __('msg.employees') }}: </label>
                            <input type="number" name="employees" value="{{old('employees')}}" class="form-control">
                        </div>
                       <div class="form-group">
                           <label>{{ __('msg.menu') }}: </label>
                           <select name="menu_id" id="" class="form-control">
                                <option value="" selected disabled>{{ __('msg.menu') }}</option>
                                @foreach ($menus as $menu)
                                <option value="{{ $menu->id }}">{{ $menu->title }}</option>
                                @endforeach
                           </select>
                       </div>
                       <button type="submit" class="btn btn-primary">{{ __('msg.submit') }}</button>
                   </form>
               </div>
           </div>
       </div>
   </div>
</div>
@endsection
