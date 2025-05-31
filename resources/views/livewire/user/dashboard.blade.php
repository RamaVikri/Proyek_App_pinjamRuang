<div class="mt-5">
    <div class="container ">
        @if (session()->has('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form wire:submit.prevent="save">
            <div class="mb-3">
                <label for="name">Nama</label>
                <input type="text" wire:model="name" id="name" class="form-control"
                    @if (!$editMode) disabled @endif>
                @error('name')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-3">
                <label for="email">Email</label>
                <input type="email" wire:model="email" id="email" class="form-control"
                    @if (!$editMode) disabled @endif>
                @error('email')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            @if ($editMode)
                <button type="submit" class="btn btn-primary">Simpan</button>
            @else
                <button type="button" wire:click="enableEdit" class="btn btn-warning">Ubah</button>
            @endif
        </form>
    </div>
</div>
