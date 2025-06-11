<div>
    <!--begin::App Content Header-->
    <div class="app-content">
        <!--begin::Container-->
        <div class="container-fluid">
            <!-- Summary Stats -->
            <div class="row">
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box">
                        <span class="info-box-icon text-bg-primary shadow-sm">
                            <i class="bi bi-building-fill"></i>
                        </span>
                        <div class="info-box-content">
                            <span class="info-box-text">Total Rooms</span>
                            <span class="info-box-number">{{ $totalRooms }}</span>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box">
                        <span class="info-box-icon text-bg-danger shadow-sm">
                            <i class="bi bi-calendar-event-fill"></i>
                        </span>
                        <div class="info-box-content">
                            <span class="info-box-text">Active Bookings</span>
                            <span class="info-box-number">{{ $activeBookings }}</span>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box">
                        <span class="info-box-icon text-bg-success shadow-sm">
                            <i class="bi bi-check-circle-fill"></i>
                        </span>
                        <div class="info-box-content">
                            <span class="info-box-text">Pending Approvals</span>
                            <span class="info-box-number">{{ $totalPendingBook }}</span>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box">
                        <span class="info-box-icon text-bg-warning shadow-sm">
                            <i class="bi bi-people-fill"></i>
                        </span>
                        <div class="info-box-content">
                            <span class="info-box-text">Registered Users</span>
                            <span class="info-box-number">{{$totalUsers}}</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Charts Row -->
            <div class="row mt-4">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Booking Activity</h3>
                        </div>
                        <div class="card-body">
                            <canvas id="bookingChart" style="height: 300px;"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Room Usage</h3>
                        </div>
                        <div class="card-body">
                            <canvas id="roomUsageChart" style="height: 300px;"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Recent Bookings and Quick Actions -->
            <div class="row mt-4">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Recent Bookings</h3>
                        </div>
                        <div class="card-body p-0">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>User</th>
                                        <th>Room</th>
                                        <th>Date</th>
                                        <th>Time</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($recentBookings as $booking)
                                        <tr>
                                            <td>{{ $booking->user->name }}</td>
                                            <td>{{ $booking->room->name }}</td>
                                            <td>{{ \Carbon\Carbon::parse($booking->start)->format('d/m/Y') }}
                                            </td>
                                            <td>{{ \Carbon\Carbon::parse($booking->start)->format('H:i') }} -
                                                {{ \Carbon\Carbon::parse($booking->end)->format('H:i') }}</td>
                                            <td>
                                                <span
                                                    class="badge bg-{{ $booking->status === 'approved'
                                                        ? 'success'
                                                        : ($booking->status === 'pending'
                                                            ? 'warning'
                                                            : ($booking->status === 'rejected'
                                                                ? 'danger'
                                                                : 'secondary')) }}">
                                                    {{ ucfirst($booking->status) }}
                                                </span>
                                            </td>
                                            <td>
                                                @if ($booking->status === 'pending')
                                                    <button class="btn btn-sm btn-success"
                                                        wire:click="approve({{ $booking->id }})">Approve</button>
                                                    <button class="btn btn-sm btn-danger"
                                                        wire:click="reject({{ $booking->id }})">Reject</button>
                                                @else
                                                    <button class="btn btn-sm btn-secondary"
                                                        wire:click="showDetails({{ $booking->id }})">Details</button>
                                                @endif
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6" class="text-center">No recent bookings found</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Quick Actions</h3>
                        </div>
                        <div class="card-body">
                            <a href="#" class="btn btn-primary btn-block mb-3">
                                <i class="bi bi-plus-circle me-2"></i> Add New Room
                            </a>
                            <a href="#" class="btn btn-success btn-block mb-3">
                                <i class="bi bi-check-square me-2"></i> Approve All Pending
                            </a>
                            <a href="#" class="btn btn-info btn-block mb-3">
                                <i class="bi bi-file-earmark-text me-2"></i> Generate Reports
                            </a>
                            <a href="#" class="btn btn-warning btn-block">
                                <i class="bi bi-gear me-2"></i> System Settings
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Calendar View -->
            <div class="row mt-4">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Today's Bookings</h3>
                        </div>
                        <div class="card-body">
                            <div id="calendar"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--end::Container-->
    </div>
    <!--end::App Content-->

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Access Livewire properties by using proper syntax
            const bookingChartData = @js($bookingsChartData);
            const roomUsageData = @js($roomUsageData);
            const calendarEvents = @js($calendarEvents);


            // Booking Activity Chart
            const bookingCtx = document.getElementById('bookingChart').getContext('2d');
            new Chart(bookingCtx, {
                type: 'line',
                data: {
                    labels: bookingChartData.labels,
                    datasets: [{
                        label: 'Bookings',
                        data: bookingChartData.data,
                        borderColor: '#0d6efd',
                        tension: 0.1
                    }]
                }
            });

            // Room Usage Chart
            const roomCtx = document.getElementById('roomUsageChart').getContext('2d');
            new Chart(roomCtx, {
                type: 'doughnut',
                data: {
                    labels: roomUsageData.labels,
                    datasets: [{
                        data: roomUsageData.data,
                        backgroundColor: roomUsageData.colors
                    }]
                }
            });

            // Calendar
            const calendarEl = document.getElementById('calendar');
            const calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'timeGridDay',
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'timeGridDay,timeGridWeek'
                },
                events: calendarEvents
            });
            calendar.render();
        });
    </script>
</div>
