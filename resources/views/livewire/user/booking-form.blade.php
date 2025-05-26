<div class="container mt-4">
    @if (session()->has('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form wire:submit.prevent="submitBooking">
        <div class="mb-3">
            <label for="room">Pilih Ruangan:</label>
            <select wire:model="room_id" class="form-control" id="room">
                <option value="">-- Pilih Ruangan --</option>
                @foreach ($rooms as $room)
                    <option value="{{ $room->id }}">{{ $room->name }}</option>
                @endforeach
            </select>
            @error('room_id') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-3">
            <label for="date">Tanggal:</label>
            <input type="date" wire:model="date" id="date" class="form-control">
            @error('date') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-3">
            <label for="time">Jam:</label>
            <input type="time" wire:model="time" id="time" class="form-control">
            @error('time') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <button type="submit" class="btn btn-primary">Booking Sekarang</button>
    </form>
</div>
