
<x-layout>
    <div class="container">
        <div class="card">
            <div class="card-header">
                Tambah Tamu
            </div>
            <div class="card-body">
                <form method="post" action="/tamu">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nama</label>
                        <input type="text" name="nama" class="form-control" placeholder="Nama Lengkap">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Kelamin</label>
                        <select name="kelamin" id="">
                            <option value="L">Laki Laki</option>
                            <option value="P">Perempuan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email</label>
                        <input type="email" name="email" class="form-control" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">No HP</label>
                        <input type="text" name="nohp" class="form-control" placeholder="No Hp">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Keperluan</label>
                        <textarea name="keperluan" id="" cols="30" rows="10" placeholder="Keperluan">
                           
                        </textarea>
            
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Tanggal Datang</label>
                        <input type="date" name="tanggalDatang" class="form-control" placeholder="Email">
                    </div>
                
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</x-layout>
