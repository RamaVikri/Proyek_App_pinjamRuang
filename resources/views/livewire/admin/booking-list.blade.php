<div>
    <div class="container">
        <div>
            <h2>Pending Booking</h2>
            <div class="table-responsive mt-4">
                <table class="table table-bordered table-hover text-center align-middle">
                    <thead class="table-primary">
                        <tr>
                            <th style="width: 50px;">No</th>
                            <th>Nama Ruang</th>
                            <th>Nama Pemesan</th>
                            <th>Jenis</th>
                            <th>Tanggal</th>
                            <th>Jam</th>
                            <th>Status</th>
                            <th style="width: 120px;"><i class="bi bi-gear-fill"></i> Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($pendingBookings as $book)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td class="text-start">{{ $book->room->name }}</td>
                                <td class="text-start">{{ $book->user->name }}</td>
                                <td>
                                    <span
                                        class="badge 
                            {{ $book->room->type === 'besar' ? 'bg-primary' : ($book->room->type === 'sedang' ? 'bg-success' : 'bg-info') }}">
                                        {{ ucfirst($book->room->type) }}
                                    </span>
                                </td>
                                <td>
                                    {{ $book->date }}
                                </td>
                                <td>
                                    {{ \Carbon\Carbon::parse($book->start)->format('H:i') }} -
                                    {{ \Carbon\Carbon::parse($book->end)->format('H:i') }}
                                </td>
                                <td>
                                    @if ($book->status == 'pending')
                                        <span class="badge bg-warning">Pending</span>
                                    @else
                                        <span class="badge bg-danger">Dipinjam</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="d-flex justify-content-center gap-2">
                                        <button wire:click="approve({{ $book->id }})" class="btn btn-sm btn-success"
                                            title="Terima">
                                            <i class="bi bi-check-circle-fill"></i>
                                        </button>
                                        <button wire:click="reject({{ $book->id }})" class="btn btn-sm btn-danger"
                                            title="Tolak">
                                            <i class="bi bi-x-circle-fill"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8">Tidak ada data ruang tersedia.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <div>
            <h2>Acc Booking</h2>
            <div class="table-responsive mt-4">
                <table class="table table-bordered table-hover text-center align-middle">
                    <thead class="table-primary">
                        <tr>
                            <th style="width: 50px;">No</th>
                            <th>Nama Ruang</th>
                            <th>Nama Pemesan</th>
                            <th>Jenis</th>
                            <th>Tanggal</th>
                            <th>Jam</th>
                            <th>Status</th>
                            <th style="width: 120px;"><i class="bi bi-gear-fill"></i> Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($approvedBookings as $book)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td class="text-start">{{ $book->room->name }}</td>
                                <td class="text-start">{{ $book->user->name }}</td>
                                <td>
                                    <span
                                        class="badge 
                            {{ $book->room->type === 'besar' ? 'bg-primary' : ($book->room->type === 'sedang' ? 'bg-success' : 'bg-info') }}">
                                        {{ ucfirst($book->room->type) }}
                                    </span>
                                </td>
                                <td>
                                    {{ $book->date }}
                                </td>
                                <td>
                                    {{ \Carbon\Carbon::parse($book->start)->format('H:i') }} -
                                    {{ \Carbon\Carbon::parse($book->end)->format('H:i') }}
                                </td>
                                <td>
                                    @if ($book->status = 'approved')
                                        <span class="badge bg-success">Diterima</span>
                                    @else
                                        <span class="badge bg-danger">Ditolak</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="d-flex justify-content-center gap-2">
                                         <button wire:click="reject({{ $book->id }})" class="btn btn-sm btn-danger"
                                            title="Tolak">
                                            <i class="bi bi-x-circle-fill"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8">Tidak ada data ruang tersedia.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @push('scripts')
        <script>
            Livewire.on('bookingApproved', message => {
                Swal.fire({
                    title: 'Berhasil!',
                    text: 'Booking telah diterima',
                    icon: 'success',
                    confirmButtonText: 'OK'
                });
            });
            Livewire.on('bookingReject', message => {
                Swal.fire({
                    title: 'Berhasil!',
                    text: 'Booking ditolak',
                    icon: 'success',
                    confirmButtonText: 'OK'
                });
            });
        </script>
    @endpush

</div>
