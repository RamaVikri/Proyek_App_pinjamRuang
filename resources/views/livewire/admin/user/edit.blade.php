<div wire:ignore.self class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit {{ $title }}</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row mb-2">
                    <div>
                        <label for="name" class="form-label">Nama Ruang</label>
                        <input wire:model="name" type="text" class="form-control @error('name') is-invalid @enderror"
                            placeholder="Masukkan nama ruang">
                        @error('name')
                            <small class="text-danger">
                                {{ $message }}
                            </small>
                        @enderror
                    </div>
                </div>
                <div class="row mb-2">
                    <div>
                        <label for="name" class="form-label">Type Ruang</label>
                        <select wire:model="role" id="role"
                            class="form-control @error('role')
                            is-invalid
                        @enderror">
                            <option selected>-- pilih role --</option>
                            <option value="0">User</option>
                            <option value="1">Admin</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">tutup</button>
                <button wire:click="update({{ $user_id }})" type="button" class="btn btn-primary">Edit</button>
            </div>
        </div>
    </div>
</div>
