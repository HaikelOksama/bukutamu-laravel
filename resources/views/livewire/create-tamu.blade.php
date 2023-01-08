<div>
    <div class="modal fade" id="modal-lg" wire:ignore.self>
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Data Tamu Baru</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <form wire:submit.prevent="store">
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input required type="text" wire:model="nama" class="form-control" placeholder="Nama Lengkap">
                </div>
                <div class="form-group">
                    <label for="kelamin">Kelamin</label>
                    <select required class="custom-select form-control-border" wire:model="kelamin" id="">
                        <option value="" readonly>-- Pilih Kelamin --</option>
                        <option value="L">Laki Laki</option>
                        <option value="P">Perempuan</option>
                    </select>
                </div>
                
                <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input type="email" name="email" wire:model="email" class="form-control" placeholder="Email">
                    @error('email')
                        <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="nohp">No HP</label>
                    <input required type="text" wire:model="nohp" class="form-control" placeholder="No Hp">
                </div>
                <div class="form-group">
                    <label for="keperluan">Keperluan</label>
                    <textarea class="form-control" wire:model="keperluan">
                    </textarea>           
                </div>
                <div class="form-group">
                    <label for="tanggalDatang">Tanggal Datang</label>
                    <input required type="date" wire:model="tanggalDatang" class="form-control" placeholder="Email">
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" onclick="submitForm()" data-bs-dismiss="modal">Simpan</button>
                </div>
                </div>            
            </form>

    
</div>
                    <!-- /.modal-content -->
        </div>
                <!-- /.modal-dialog -->
</div>
</div>


