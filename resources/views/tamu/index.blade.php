<x-layout>
    <x-slot:title>Tamu</x-slot:title>

    {{-- <div class="card">
        <h2 class="card-header">
            Filter Data Tamu
        </h2>
        <div class="card-body">
            <div class="container">
                <form action="" method="get">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <div class="form-group">
                                <label for="inputText" class="control-label mb-2 mr-2">Bulan</label>
                                <input type="month" name="month" class="form-control" id="inputText" placeholder="Filter Data">
                            </div>
                        </div>
                        <div class="col-4 mt-3">
                            <button type="submit" class="btn btn-primary w-100">Cari</button>
                        </div> 
                    </div>
                </form>     
            </div>
            <div class="container">
                <form action="" method="get">
                    <div class="row align-items-center">
                        <div class="col-4">
                            <div class="form-group">
                                <label for="inputText" class="control-label mb-2 mr-2">Awal</label>
                                <input type="date" name="awal" class="form-control" id="inputText" placeholder="Filter Data">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="inputText" class="control-label mb-2 mr-2">Akhir</label>
                                <input type="date" name="akhir" class="form-control" id="inputText" placeholder="Filter Data">
                            </div>
                        </div>
                        <div class="col-4 mt-3">
                            <button type="submit" class="btn btn-primary w-100">Cari</button>
                        </div> 
                    </div>
                </form> 
            </div>
        </div>
    </div> --}}

    {{-- <livewire:tamu-filter-form></livewire:tamu-filter-form> --}}

    <div class="card">
        <div class="card-header">
            <h2 class="mr-auto">Data Tamu Kantor Pusat</h2>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-lg">
                    Tambah Data
                </button>
           
                <livewire:create-tamu></livewire:create-tamu>
                    
        </div>
        <div class="card-body">
            {{-- <x-tamu-table :tamu="$tamu" /> --}}
            <livewire:guest-index>
            </livewire:guest-index>
        </div>
    </div>

    

</x-layout>

