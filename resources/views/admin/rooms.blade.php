@extends('layouts.dashboard.app')

@section('title', 'Rooms')

@section('sidebarRooms', 'active')


@section('content')
    <livewire:admin.rooms />
@endsection
