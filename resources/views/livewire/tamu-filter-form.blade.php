<div>
    <div class="card">
        <h2 class="card-header">
            Filter Data Tamu
        </h2>
        <div class="card-body">
            <div class="container">
                
                <div class="row align-items-center">
                    <div class="col-8">
                        <div class="form-group">
                            <label for="inputText" class="control-label mb-2 mr-2">Bulan</label>
                            <input wire:model="month" type="month" name="month" class="form-control" id="inputText" placeholder="Filter Data">
                        </div>
                    </div>
                </div>

            </div>
            <div class="container">
                    <div class="row align-items-center">
                        <div class="col-4">
                            <div class="form-group">
                                <label for="inputText" class="control-label mb-2 mr-2">Awal</label>
                                <input wire:model="awal" type="date" name="awal" class="form-control" id="inputText" placeholder="Filter Data">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="inputText" class="control-label mb-2 mr-2">Akhir</label>
                                <input wire:model="akhir" type="date" name="akhir" class="form-control" id="inputText" placeholder="Filter Data">
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</div>
