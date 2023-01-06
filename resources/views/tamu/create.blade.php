<x-layout>
    <x-slot:title>Input</x-slot:title>
        <div class="card card-primary card-outline">
            <h2 class="card-header">
                Tambah Tamu
            </h2>
            <div class="card-body">
                <form method="post" action="/tamu">
                    @csrf
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input required type="text" name="nama" class="form-control" placeholder="Nama Lengkap">
                    </div>
                    <div class="form-group">
                        <label for="kelamin">Kelamin</label>
                        <select class="custom-select form-control-border" name="kelamin" id="">
                            <option value="L">Laki Laki</option>
                            <option value="P">Perempuan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email</label>
                        <input type="email" name="email" class="form-control" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <label for="nohp">No HP</label>
                        <input required type="text" name="nohp" class="form-control" placeholder="No Hp">
                    </div>
                    <div class="form-group">
                        <label for="keperluan">Keperluan</label>
                        <textarea class="form-control" name="keperluan" id="" placeholder="Keperluan">
                        </textarea>           
                    </div>
                    <div class="form-group">
                        <label for="tanggalDatang">Tanggal Datang</label>
                        <input type="date" name="tanggalDatang" class="form-control" placeholder="Email">
                    </div>
                
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
</x-layout>
