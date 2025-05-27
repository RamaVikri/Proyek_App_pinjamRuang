<div wire:ignore.self class="modal fade" id="createModal" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah {{ $title }}</h1>
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
                        <select wire:model="type" id="type"
                            class="form-control @error('type')
                            is-invalid
                        @enderror">
                            <option selected>-- pilih tipe ruang --</option>
                            <option value="besar">Besar</option>
                            <option value="sedang">Sedang</option>
                            <option value="kecil">Kecil</option>
                        </select>
                        @error('type')
                            <small class="text-danger">
                                {{ $message }}
                            </small>
                        @enderror
                    </div>
                </div>
                <div class="row mb-2">
                    <div>
                        <label for="desc" class="form-label">Deskripsi Ruang</label>

                        <textarea wire:model="desc" class="form-control  @error('desc') is-invalid @enderror" placeholder="Masukkan Desckripsi ruang" id="desc" style="height: 100px"></textarea>
                        @error('desc')
                            <small class="text-danger">
                                {{ $message }}
                            </small>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">tutup</button>
                <button wire:click="store" type="button" class="btn btn-primary">Tambah</button>
            </div>
        </div>
    </div>
</div>
