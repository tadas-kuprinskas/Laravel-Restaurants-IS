@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header">{{ __('msg.description') }}</div>
    <div class="card-body">
        <h5>{{ __('msg.title') }}: {{ $restaurant->title }}</h5>
        <h5>{{ __('msg.customers') }}: {{ $restaurant->customers }}</h5>
        <h5>{{ __('msg.employees') }}: {{ $restaurant->employees }}</h5>
        <hr>
        <h5>{{ __('msg.menu') }}:  {{ $restaurant->menu->title }}</h5>
    </div>
</div>
@endsection
