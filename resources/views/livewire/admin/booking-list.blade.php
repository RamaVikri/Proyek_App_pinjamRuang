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
                                <td>
                                    <span
                                        class="badge 
                            {{ $book->room->type === 'besar' ? 'bg-primary' : ($book->room->type === 'sedang' ? 'bg-success' : 'bg-info') }}">
                                        {{ ucfirst($book->room->type) }}
                                    </span>
                                </td>
                                <td>
                                    {{ $book->room->name }}
                                </td>
                                <td>
                                    {{ $book->date }}
                                </td>
                                <td>
                                    {{ \Carbon\Carbon::parse($book->start)->format('H:i') }} -
                                    {{ \Carbon\Carbon::parse($book->end)->format('H:i') }}
                                </td>
                                <td>
                                    @if ($book->status = 'pending')
                                        <span class="badge bg-warning">Pending</span>
                                    @else
                                        <span class="badge bg-danger">Dipinjam</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="d-flex justify-content-center gap-2">
                                        <a href="#" class="btn btn-sm btn-warning">
                                            <i class="bi bi-pencil-square"></i>

                                        </a>
                                        <a href="#" class="btn btn-sm btn-danger"
                                            onclick="return confirm('Yakin ingin menghapus?')">
                                            <i class="bi bi-trash3-fill"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7">Tidak ada data ruang tersedia.</td>
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
                                <td>
                                    <span
                                        class="badge 
                            {{ $book->room->type === 'besar' ? 'bg-primary' : ($book->room->type === 'sedang' ? 'bg-success' : 'bg-info') }}">
                                        {{ ucfirst($book->room->type) }}
                                    </span>
                                </td>
                                <td>
                                    {{ $book->room->name }}
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
                                        <span class="badge bg-success">Dipinjam</span>
                                    @else
                                        <span class="badge bg-danger">Dipinjam</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="d-flex justify-content-center gap-2">
                                        <a href="#" class="btn btn-sm btn-warning">
                                            <i class="bi bi-pencil-square"></i>

                                        </a>
                                        <a href="#" class="btn btn-sm btn-danger"
                                            onclick="return confirm('Yakin ingin menghapus?')">
                                            <i class="bi bi-trash3-fill"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7">Tidak ada data ruang tersedia.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>
