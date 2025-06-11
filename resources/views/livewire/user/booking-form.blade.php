<div class="container mt-4">
    <div class="card shadow-sm border-0">
        <div class="card-header bg-primary">
            <h4 class="mb-0  text-white rounded-4xl"><i class="bi bi-calendar-plus me-2"></i>Formulir Peminjaman Ruangan</h4>
        </div>
        <div class="card-body p-4">
            <form wire:submit.prevent="submitBooking">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="room" class="form-label fw-bold">
                            <i class="bi bi-building me-1"></i> Pilih Ruangan:
                        </label>
                        <select wire:model="room_id" class="form-select shadow-sm" id="room">
                            <option value="">-- Pilih Ruangan --</option>
                            @foreach ($rooms as $room)
                                <option value="{{ $room->id }}">{{ $room->name }}</option>
                            @endforeach
                        </select>
                        @error('room_id')
                            <small class="text-danger"><i class="bi bi-exclamation-circle"></i> {{ $message }}</small>
                        @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="date" class="form-label fw-bold">
                            <i class="bi bi-calendar-date me-1"></i> Tanggal:
                        </label>
                        <input type="date" wire:model="date" id="date" class="form-control shadow-sm">
                        @error('date')
                            <small class="text-danger"><i class="bi bi-exclamation-circle"></i> {{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="start" class="form-label fw-bold">
                            <i class="bi bi-clock me-1"></i> Jam Mulai:
                        </label>
                        <input type="time" wire:model="start" id="start" class="form-control shadow-sm">
                        @error('start')
                            <small class="text-danger"><i class="bi bi-exclamation-circle"></i> {{ $message }}</small>
                        @enderror
                    </div>
                    
                    <div class="col-md-6 mb-3">
                        <label for="end" class="form-label fw-bold">
                            <i class="bi bi-clock-history me-1"></i> Jam Selesai:
                        </label>
                        <input type="time" wire:model="end" id="end" class="form-control shadow-sm">
                        @error('end')
                            <small class="text-danger"><i class="bi bi-exclamation-circle"></i> {{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-4">
                    <button type="submit" class="btn btn-primary px-4 py-2">
                        <i class="bi bi-calendar-check me-2"></i>Booking Sekarang
                    </button>
                </div>
            </form>
        </div>
    </div>
    @push('scripts')
        <script>
            Livewire.on('bookingSuccess', () => {
                Swal.fire({
                    title: 'Berhasil!',
                    text: 'Peminjaman berhasil diajukan.',
                    icon: 'success',
                    confirmButtonText: 'OK'
                });
            });
        </script>
    @endpush
</div>
