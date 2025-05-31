@extends('layouts.dashboard.app')

@section('title', 'Booking History')


@section('content')
@section('sidebarBook', 'active')
    <livewire:admin.book-history />
@endsection
