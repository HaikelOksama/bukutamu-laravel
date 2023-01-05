
<x-layout>
    <div class="container">
        <div class="card">
            <div class="card-header">
                Edit Tamu
            </div>
            <div class="card-body">
                <form method="POST" action="{{route('update', $tamu->id)}}">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nama</label>
                        <input type="text" name="nama" class="form-control" placeholder="Nama Lengkap" value="{{$tamu->nama}}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Kelamin</label>
                        <select name="kelamin" id="">
                            <option value="L" {{$tamu->kelamin == 'L' ? 'selected':''}}>Laki Laki</option>
                            <option value="P" {{$tamu->kelamin == 'P' ? 'selected':''}}>Perempuan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email</label>
                        <input type="email" name="email" class="form-control" placeholder="Email" value="{{$tamu->email}}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">No HP</label>
                        <input type="text" name="nohp" class="form-control" placeholder="No Hp" value="{{$tamu->noHp}}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Keperluan</label>
                        <textarea name="keperluan" id="" cols="30" rows="10" placeholder="Keperluan">
                            {{$tamu->keperluan}}
                        </textarea>
            
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Tanggal Datang</label>
                        <input type="date" name="tanggalDatang" class="form-control" value="{{$tamu->tanggalDatang}}">
                    </div>
                
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</x-layout>
