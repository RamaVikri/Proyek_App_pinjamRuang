<?php

use App\Livewire\Admin\RoomForm;
use App\Livewire\Admin\BookingList;
use App\Livewire\BookingForm;
use App\Livewire\Settings\Appearance;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Profile;

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

    // Route::get('/room', RoomForm::class)->name('room');
    Route::get('/user/booking-form', function(){
        return view('user.booking-form');
    })->name('user.bookingform');

   
});

Route::middleware(['auth', 'is_admin'])->prefix('admin')->name('admin.')->group(function(){
    Route::redirect('settings', 'settings/profile');

    Route::get('settings/profile', Profile::class)->name('settings.profile');
    Route::get('settings/password', Password::class)->name('settings.password');
    Route::get('settings/appearance', Appearance::class)->name('settings.appearance');

    // Route::get('/room', RoomForm::class)->name('room');
    Route::get('/booking-list', RoomForm::class)->name('bookinglist');

    });

Route::view('admin/dashboard', 'admin.dashboard')->name('admin.dashboard');
Route::view('admin/users', 'admin.users')->name('admin.users');
Route::view('admin/rooms', 'admin.rooms')->name('admin.rooms');
Route::view('admin/bookinglist', 'admin.bookinglist')->name('admin.bookinglist');



// Route::get('pinjam',\App\Livewire\User\BookingForm::class)->middleware('auth');
// Route::get('/admin/booking', \App\Livewire\User\BookingForm::class)->middleware('auth');


require __DIR__.'/auth.php';
