@extends('layouts.dashboard.app')

@section('title', 'Users')

@section('sidebarUsers', 'active')

@section('content')
    <livewire:admin.users />
@endsection
