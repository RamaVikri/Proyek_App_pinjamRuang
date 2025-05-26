@extends('layouts.dashboard.app')

@section('title', 'Booking List')


@section('content')
@section('sidebarBook', 'active')
    <livewire:admin.booking-list />
@endsection
