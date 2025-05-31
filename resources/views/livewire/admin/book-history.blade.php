<div>
    <div class="container">
        <div>
            <h4>History Booking Done</h4>
            <div class="table-responsive mt-4">
                <table class="table table-bordered table-hover text-center align-middle">
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
                        @forelse ($donebookings as $book)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $book->user->name }}</td>
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
                                <td>Done</td>
                            @empty
                            <tr>
                                <td colspan="6">Tidak ada data ruang tersedia.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        <div>
            <h4>History Booking Reject</h4>
            <div class="table-responsive mt-4">
                <table class="table table-bordered table-hover text-center align-middle">
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
                        @forelse ($rejectbookings as $book)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $book->user->name }}</td>
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
                                    <div class=" text-red-100">
                                    Reject
                                    </div>
                                </td>
                            @empty
                            <tr>
                                <td colspan="6">Tidak ada data ruang tersedia.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

    </div>
