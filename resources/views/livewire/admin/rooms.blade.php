<div>
    <div class="container">
        <div class="mb-3">
            <button wire:click="create" class="btn btn-sm btn-primary " data-bs-toggle="modal"
                data-bs-target="#createModal">
                <i class="fas fa-plus mr-1"></i>
                Tambah Ruangan
            </button>
            <i></i>
        </div>

        <div class="mb-4 d-flex justify-content-between">
            <div class="col-1">
                <select wire:model.live="paginate" class="form-control form-select">
                    <option value="10">10</option>
                    <option value="25">25</option>
                    <option value="50">50</option>
                    <option value="100">100</option>
                </select>
            </div>
            <div class="col-4.5">
                <input wire:model.live="search" type="text" placeholder="Search" class="form-control">
            </div>
        </div>
        <div class="table-responsive mt-4">
            <table class="table table-bordered table-hover text-center align-middle">
                <thead class="table-primary">
                    <tr>
                        <th style="width: 50px;">No</th>
                        <th>Nama Ruang</th>
                        <th>Jenis</th>
                        <th>Deskripsi</th>
                        <th style="width: 120px;"><i class="bi bi-gear-fill"></i> Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($rooms as $room)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td class="text-start">{{ $room->name }}</td>
                            <td>
                                <span
                                    class="badge 
                            {{ $room->type === 'besar' ? 'bg-primary' : ($room->type === 'sedang' ? 'bg-success' : 'bg-info') }}">
                                    {{ ucfirst($room->type) }}
                                </span>
                            </td>
                            <td class="text-start" style="max-width: 300px;">
                                {{ Str::limit($room->desc, 100) }}
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
                            <td colspan="5">Tidak ada data ruang tersedia.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            {{-- Pagination --}}
            @if (method_exists($rooms, 'links'))
                <div class="d-flex justify-content-center mt-3 ">
                    {{ $rooms->links('pagination::bootstrap-5') }}
                </div>
            @endif
        </div>
        {{-- create Modal --}}
        @include('livewire.admin.rooms.create')
        {{-- create Modal --}}

        {{-- close craeted modal --}}
        @script
            <script>
                Livewire.on('closedCreatedModal', () => {
                    $('#createModal').modal('hide');

                    Swal.fire({
                        title: "Room Success",
                        text: "Room have been added",
                        icon: "success"
                    });
                });
            </script>
        @endscript
        {{-- close craeted modal --}}
        {{-- Because she competes with no one, no one can compete with her. --}}
    </div>
</div>
