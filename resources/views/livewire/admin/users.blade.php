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
                    @forelse ($users as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td class="text-start">{{ $item->name }}</td>
                            <td class="text-start">{{ $item->email }}</td>
                            <td>
                                <span class="badge {{ $item->is_admin ? 'bg-info' : 'bg-secondary' }}">
                                    {{ $item->is_admin ? 'Admin' : 'User' }}
                                </span>
                            </td>
                            <td>
                                <div class="d-flex justify-content-center gap-2">
                                    <a href="#" class="btn btn-sm btn-warning">
                                        <i class="bi bi-person-fill-gear"></i>
                                    </a>
                                    <a href="#" class="btn btn-sm btn-danger"
                                        onclick="return confirm('Yakin ingin menghapus?')">
                                        <i class="bi bi-person-dash-fill"></i>
                                    </a>
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
    {{-- Because she competes with no one, no one can compete with her. --}}
</div>
