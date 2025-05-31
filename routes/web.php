<?php

use App\Livewire\BookingForm;
use App\Livewire\Admin\RoomForm;
use App\Livewire\Settings\Profile;
use App\Livewire\Admin\BookHistory;
use App\Livewire\Admin\BookingList;
use App\Livewire\Settings\Password;

use App\Livewire\Settings\Appearance;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('room', 'room') -> name('room');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Route::get('settings/profile', Profile::class)->name('settings.profile');
    Route::get('settings/password', Password::class)->name('settings.password');
    Route::get('settings/appearance', Appearance::class)->name('settings.appearance');

    Route::get('/user/booking-form', function(){
        return view('user.booking-form');
    })->name('user.bookingform');
    Route::get('/user/booking-history', function(){
        return view('user.bookinghistory');
    })->name('user.bookinghistory');
    Route::get('/user/dashboard', function(){
        return view('user.dashboard');
    })->name('user.dashboard');

});

Route::middleware(['auth', 'is_admin'])->prefix('admin')->name('admin.')->group(function(){
    Route::redirect('settings', 'settings/profile');

    Route::get('settings/profile', Profile::class)->name('settings.profile');
    Route::get('settings/password', Password::class)->name('settings.password');
    Route::get('settings/appearance', Appearance::class)->name('settings.appearance');

    // Route::get('/booking-list', RoomForm::class)->name('bookinglist');

    Route::view('/dashboard', 'admin.dashboard')->name('dashboard');
    Route::view('/users', 'admin.users')->name('users');
    Route::view('/rooms', 'admin.rooms')->name('rooms');
    Route::view('/bookinglist', 'admin.bookinglist')->name('bookinglist');
    Route::view('/book-history', 'admin.bookhistory')->name('book-history');
    Route::get('./user/dashboard', function(){
        return view('user.dashboard');
    })->name('user.dashboard');
    });

// Route::get('pinjam',\App\Livewire\User\BookingForm::class)->middleware('auth');
// Route::get('/admin/booking', \App\Livewire\User\BookingForm::class)->middleware('auth');

require __DIR__.'/auth.php';
