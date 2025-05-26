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
        <div class="table-responsive">
            <table class="table table-hover border-2">
                <thead> 
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>
                            <i class="bi bi-gear-fill"></i>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($user as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->email }}</td>
                            @if ($item->is_admin == true)
                                <td>
                                    <span class="badge bg-info">
                                        Admin
                                    </span> 
                                </td>
                            @else
                                <td>
                                    <span class="badge bg-dark-subtle">
                                        User
                                    </span> 
                                </td>
                            @endif
                            <td>
                                <button class="btn btn-sm bg-warning">
                                    <i class="bi bi-person-fill-gear"></i>
                                    <a href="">Edit</a>
                                </button>
                                <button class="btn btn-sm bg-danger">
                                    <i class="bi bi-person-dash-fill"></i>
                                    <a href="">Hapus</a>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $user->links() }}
        </div>
    </div>
    {{-- Because she competes with no one, no one can compete with her. --}}
</div>
