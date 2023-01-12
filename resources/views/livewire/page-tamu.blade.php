<div>
    <form wire:submit.prevent="store">
        <div class="form-group">
            <label for="nama">Nama *</label>
            <input required type="text" wire:model="nama" class="form-control" placeholder="Nama Lengkap">
        </div>
        <div class="form-group">
            <label for="kelamin">Kelamin *</label>
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
            <label for="nohp">No HP (+62) *</label>
            <div class="input-group mb-3">
                {{-- <input type="hidden" name="prefixHp" value="+62" wire:model="prefixHp"> --}}
                <div class="input-group-prepend">
                <button type="button" disabled class="btn btn-danger">{{$prefixHp}}</button>
                </div>
                <!-- /btn-group -->
                <input required type="text" wire:model="nohp" class="form-control" placeholder="No Hp">
            </div>
            @error('nohp')
            <small class="text-danger">{{$message}}</small>
            @enderror
        </div>
        {{-- <div class="form-group">
            <label for="nohp">No HP</label>
            <input required type="text" wire:model="nohp" class="form-control" placeholder="No Hp">
            @error('nohp')
                <small class="text-danger">{{$message}}</small>
            @enderror
        </div> --}}
        <div class="form-group">
            <label for="keperluan">Keperluan *</label>
            <textarea class="form-control" wire:model="keperluan">
            </textarea>           
        </div>
        <div class="form-group">
            <label for="tanggalDatang">Tanggal Datang *</label>
            <input required type="date" wire:model="tanggalDatang" class="form-control" placeholder="Email">
        </div>
        <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Kirim </button>       
        </div>            
    </form>
</div>
