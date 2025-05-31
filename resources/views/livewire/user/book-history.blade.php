<div>
    <div class="container">
        <div class="table-responsive mt-4">
            <table class="table table-bordered table-hover text-center align-middle text-dark ">
                <thead class="table-primary">
                    <tr>
                        <th style="width: 50px;">No</th>
                        <th>Nama Pemesan</th>
                        <th>Ruang</th>
                        <th>Tanggal</th>
                        <th>Jam</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($bookings as $book)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $book->user->name }}</td>
                            <td>{{ $book->room->name }}</td>
                            <td>{{ $book->date }}</td>
                            <td>
                                {{ \Carbon\Carbon::parse($book->start)->format('H:i') }} -
                                {{ \Carbon\Carbon::parse($book->end)->format('H:i') }}
                            </td>
                            <td>
                                @if ($book->status == 'done')
                                    <span class="text-succes">Done</span>
                                @elseif ($book->status == 'reject')
                                    <span class="text-danger">Rejected</span>
                                @elseif ($book->status == 'pending')
                                    <span class="text-succes">Pending</span>
                                @else
                                    <span class="badge bg-warning text-dark">{{ ucfirst($book->status) }}</span>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6">Tidak ada data booking</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
