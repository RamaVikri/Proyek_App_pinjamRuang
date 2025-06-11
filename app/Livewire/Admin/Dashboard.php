<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Room;
use App\Models\Booking;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class Dashboard extends Component
{
    public $totalRooms;
    public $activeBookings;
    public $totalPendingBook;
    public $totalUsers;
    public $recentBookings;
    public $bookingsChartData;
    public $roomUsageData;
    public $calendarEvents;
    
    public function mount()
    {
        // Summary stats
        $this->totalRooms = Room::count();
        $this->activeBookings = Booking::where('status', 'approved')
            ->where('end', '>=', now())
            ->count();
        $this->totalPendingBook = Booking::where('status', 'pending')->count();
        $this->totalUsers = User::count();
        
        // Recent bookings
        $this->recentBookings = Booking::with(['user', 'room'])
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();
            
        // Chart data - Bookings per month (last 6 months)
        $bookingsPerMonth = Booking::select(
                DB::raw("MONTH(created_at) as month"), 
                DB::raw("YEAR(created_at) as year"),
                DB::raw('COUNT(*) as count')
            )
            ->where('created_at', '>=', Carbon::now()->subMonths(6))
            ->groupBy('month', 'year')
            ->orderBy('year')
            ->orderBy('month')
            ->get();
            
        $labels = [];
        $data = [];
        
        // Fill in data for the past 6 months
        for ($i = 5; $i >= 0; $i--) {
            $month = Carbon::now()->subMonths($i);
            $labels[] = $month->format('M');
            
            $count = 0;
            foreach ($bookingsPerMonth as $booking) {
                if ((int)$booking->month == $month->month && (int)$booking->year == $month->year){
                    $count = $booking->count;
                    break;
                }
            }
            $data[] = $count;
        }
        
        $this->bookingsChartData = [
            'labels' => $labels,
            'data' => $data
        ];
        
        // Room usage data
        $roomUsage = Booking::select('room_id', DB::raw('COUNT(*) as count'))
            ->where('status', 'approved')
            ->groupBy('room_id')
            ->orderByDesc('count')
            ->take(4)
            ->get();
            
        $roomLabels = [];
        $roomData = [];
        $colors = ['#0d6efd', '#dc3545', '#ffc107', '#198754'];
        
        foreach ($roomUsage as $index => $usage) {
            $room = Room::find($usage->room_id);
            $roomLabels[] = $room ? $room->name : "Room {$usage->room_id}";
            $roomData[] = $usage->count;
        }
        
        $this->roomUsageData = [
            'labels' => $roomLabels,
            'data' => $roomData,
            'colors' => $colors
        ];
        
        // Calendar events
        $todayEvents = Booking::with('room', 'user')
            ->where('start', '>=', Carbon::today())
            ->where('start', '<', Carbon::tomorrow())
            ->get();
            
        $this->calendarEvents = $todayEvents->map(function($booking) {
            $statusColor = [
                'pending' => '#ffc107',
                'approved' => '#0d6efd',
                'rejected' => '#dc3545',
                'canceled' => '#6c757d'
            ][$booking->status] ?? '#0d6efd';
            
            return [
                'title' => $booking->room->name . ' - ' . $booking->user->name,
                'start' => $booking->start,
                'end' => $booking->end,
                'color' => $statusColor
            ];
        });
    }
    
    public function approve($bookingId)
    {
        $booking = Booking::find($bookingId);
        if ($booking) {
            $booking->status = 'approved';
            $booking->save();
            // Refresh data after action
            $this->mount();
        }
    }

    public function reject($bookingId)
    {
        $booking = Booking::find($bookingId);
        if ($booking) {
            $booking->status = 'rejected';
            $booking->save();
            // Refresh data after action
            $this->mount();
        }
    }

    public function showDetails($bookingId)
    {
        // Redirect to booking details page
        return redirect()->route('admin.booking.detail', ['id' => $bookingId]);
    }

    public function render()
    {
        return view('livewire.admin.dashboard');
    }
}
