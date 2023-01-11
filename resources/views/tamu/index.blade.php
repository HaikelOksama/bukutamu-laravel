<x-layout>
    <x-slot:title>Tamu</x-slot:title>

    {{-- <livewire:tamu-filter-form></livewire:tamu-filter-form> --}}

    <div class="card">
        <div class="card-header">
            <h2 class="mr-auto">Data Tamu Kantor Pusat</h2>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-lg">
                    Tambah Data
                </button>
                    
        </div>
        <div class="card-body">
            {{-- <x-tamu-table :tamu="$tamu" /> --}}
            <livewire:guest-index>
            </livewire:guest-index>
        </div>
    </div>
</x-layout>

