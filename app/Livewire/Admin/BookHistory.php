<?php

namespace App\Livewire\Admin;

use Carbon\Carbon;
use App\Models\Room;
use App\Models\Booking;
use Livewire\Component;

class BookHistory extends Component
{
    public $bookings;
    public function mount()
    {
        $this->updateExpiredStatuses();
        $this->loadBookings();
    }
    public function loadBookings()
    {
        $this->bookings = Booking::with('user', 'room')->latest()->get();
    }
    public function render()
    {

        $donebookings = Booking::with(['user', 'room'])
            ->orderBy('date', 'desc')
            ->orderBy('start', 'desc')
            ->where('status', 'completed')
            ->get();

        $rejectbookings = Booking::with(['user', 'room'])
            ->orderBy('date', 'desc')
            ->orderBy('start', 'desc')
            ->where('status', 'rejected')
            ->get();

        return view(
            'livewire.admin.book-history',
            [
                'donebookings' => $donebookings,
                'rejectbookings' => $rejectbookings
            ]
        );
    }

    public function updateExpiredStatuses()
    {
        $now = Carbon::now();

        // tandai ruangan yang telah diapproved
        $completedBookings = Booking::where('status', 'approved')
            ->where('end', '<=', $now)
            ->get();

        // Update setiap booking 
        foreach ($completedBookings as $booking) {
            // Update booking status
            $booking->status = 'completed';
            $booking->save();

            // Update room status 
            $room = Room::find($booking->room_id);
            if ($room) {
                // Check jika ada ruang yang masih dalam masa pinjam
                $hasActiveBookings = Booking::where('room_id', $room->id)
                    ->where('id', '!=', $booking->id)
                    ->where('status', 'approved')
                    ->where('end', '>', $now)
                    ->exists();

                // jika sudah lewat masa waktu maka menjadi tersedia
                if (!$hasActiveBookings) {
                    $room->status = 'tersedia';
                    $room->save();
                }
            }
        }
        Booking::where('status', 'pending')
            ->where('end', '<=', $now)
            ->update(['status' => 'rejected']);
    }
}
