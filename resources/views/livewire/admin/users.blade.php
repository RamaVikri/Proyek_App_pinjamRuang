<div>
    <div class="container">
        
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
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th style="width: 120px;"><i class="bi bi-gear-fill"></i> Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($users as $user)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td class="text-start">{{ $user->name }}</td>
                            <td class="text-start">{{ $user->email }}</td>
                            <td>
                                <span class="badge {{ $user->is_admin ? 'bg-info' : 'bg-secondary' }}">
                                    {{ $user->is_admin ? 'Admin' : 'User' }}
                                </span>
                            </td>
                            <td>
                                <div class="d-flex justify-content-center gap-2">
                                    <button wire:click="edit({{$user->id}})" class="btn btn-sm btn-warning " data-bs-toggle="modal"
                                        data-bs-target="#editModal">
                                        <i class="bi bi-person-fill-gear"></i>
                                    </button>
                                    <button wire:click="confirm({{$user->id}})" class="btn btn-sm btn-danger " data-bs-toggle="modal"
                                        data-bs-target="#deleteModal">
                                        <i class="bi bi-person-dash-fill"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5">Tidak ada data pengguna.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            {{-- Pagination --}}
            <div class="d-flex justify-content-center mt-3 mr-1">
                {{ $users->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </div>
        {{-- create Modal Edit User --}}
        @include('livewire.admin.user.edit')
        {{-- create Modal --}}
        {{-- create Modal Delte delete --}}
        @include('livewire.admin.user.delete')
        {{-- create Modal --}}

         {{-- close Edit modal --}}
        @script
            <script>
                Livewire.on('closedEditModal', () => {
                    $('#editModal').modal('hide');

                    Swal.fire({
                        title: "User Success",
                        text: "User have been edit",
                        icon: "success"
                    });
                });
            </script>
        @endscript
        {{-- close Edit modal --}}
        {{-- close Delete modal --}}
        @script
            <script>
                Livewire.on('closedDeleteModal', () => {
                    $('#deleteModal').modal('hide');

                    Swal.fire({
                        title: "User Success",
                        text: "User have been delete",
                        icon: "success"
                    });
                });
            </script>
        @endscript
</div>
