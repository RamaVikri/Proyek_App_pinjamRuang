<div wire:ignore.self class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus {{ $title }}</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-4">
                        Name 
                    </div>
                    <div class="col-8">
                        : {{ $name }}
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        type 
                    </div>
                    <div class="col-8"> 
                        : {{ $type }}
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">tutup</button>
                <button wire:click="destroy({{ $room_id }})" type="button" class="btn btn-danger">Hapus</button>
            </div>
        </div>
    </div>
</div>
