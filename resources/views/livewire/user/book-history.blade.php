<div>
    <div class="container">
        <div class="card border-0 rounded-3 shadow-sm mt-4">
            <div class="card-header bg-white border-bottom-0 pt-4 pb-2 px-4">
                <h5 class="fw-bold text-primary">
                    <i class="bi bi-journal-bookmark"></i> Riwayat Peminjaman Ruangan
                </h5>
                <p class="text-muted small mb-0">Daftar semua peminjaman ruangan Anda</p>
            </div>
            
            <div class="card-body px-4">
                <div class="table-responsive">
                    <style>
                        .table-hover tbody tr:hover {
                            background-color: rgba(13, 110, 253, 0.04) !important; /* Light blue with very low opacity */
                            color: inherit !important;
                        }
                    </style>
                    <table class="table table-hover border-bottom text-black">
                        <thead>
                            <tr class="bg-light">
                                <th class="border-0 rounded-start" width="5%">No</th>
                                <th class="border-0" width="20%">Nama</th>
                                <th class="border-0" width="20%">Ruangan</th>
                                <th class="border-0" width="15%">Tanggal</th>
                                <th class="border-0" width="20%">Waktu</th>
                                <th class="border-0 rounded-end" width="20%">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($bookings as $book)
                                <tr>
                                    <td class="align-middle">{{ $loop->iteration }}</td>
                                    <td class="align-middle">{{ $book->user->name }}</td>
                                    <td class="align-middle fw-medium">{{ $book->room->name }}</td>
                                    <td class="align-middle">{{ \Carbon\Carbon::parse($book->date)->format('d/m/Y') }}</td>
                                    <td class="align-middle">
                                        <div class="d-inline-block px-2 py-1 bg-light rounded-1 small">
                                            <i class="bi bi-clock"></i> 
                                            {{ \Carbon\Carbon::parse($book->start)->format('H:i') }} - 
                                            {{ \Carbon\Carbon::parse($book->end)->format('H:i') }}
                                        </div>
                                    </td>
                                    <td class="align-middle">
                                        @if ($book->status == 'done' || $book->status == 'completed')
                                            <div class="d-inline-flex align-items-center px-2 py-1 rounded-pill bg-success-subtle text-success">
                                                <i class="bi bi-check-circle-fill me-1 small"></i>
                                                <span class="small fw-medium">Selesai</span>
                                            </div>
                                        @elseif ($book->status == 'reject' || $book->status == 'rejected')
                                            <div class="d-inline-flex align-items-center px-2 py-1 rounded-pill bg-danger-subtle text-danger">
                                                <i class="bi bi-x-circle-fill me-1 small"></i>
                                                <span class="small fw-medium">Ditolak</span>
                                            </div>
                                        @elseif ($book->status == 'pending')
                                            <div class="d-inline-flex align-items-center px-2 py-1 rounded-pill bg-warning-subtle text-warning">
                                                <i class="bi bi-hourglass-split me-1 small"></i>
                                                <span class="small fw-medium">Menunggu</span>
                                            </div>
                                        @elseif ($book->status == 'approved')
                                            <div class="d-inline-flex align-items-center px-2 py-1 rounded-pill bg-primary-subtle text-primary">
                                                <i class="bi bi-check-circle-fill me-1 small"></i>
                                                <span class="small fw-medium">Disetujui</span>
                                            </div>
                                        @else
                                            <div class="d-inline-flex align-items-center px-2 py-1 rounded-pill bg-secondary-subtle text-secondary">
                                                <i class="bi bi-info-circle-fill me-1 small"></i>
                                                <span class="small fw-medium">{{ ucfirst($book->status) }}</span>
                                            </div>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center py-5">
                                        <img src="https://cdn-icons-png.flaticon.com/512/7486/7486754.png" alt="No data" width="80" class="mb-3 opacity-25">
                                        <p class="text-muted mb-0">Anda belum memiliki riwayat peminjaman ruangan</p>
                                        <a href="{{ route('user.bookingform') }}" class="btn btn-sm btn-primary mt-3">
                                            <i class="bi bi-plus-circle me-1"></i> Pesan Ruangan
                                        </a>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            
            @if(count($bookings) > 0)
            <div class="card-footer bg-white text-end border-top-0 pb-4 px-4">
                <a href="{{ route('user.bookingform') }}" class="btn btn-primary btn-sm">
                    <i class="bi bi-plus-circle me-1"></i> Peminjaman Baru
                </a>
            </div>
            @endif
        </div>
    </div>
</div>
