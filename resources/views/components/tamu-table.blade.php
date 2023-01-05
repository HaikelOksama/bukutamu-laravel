@props(['tamu'])

@unless (count($tamu) == 0)
        <table class="table table-bordered">
            <thead>
                <tr>

                    <th>No</th>
                    <th>Nama</th> 
                    <th>Kelamin</th>
                    <th>Email</th>
                    <th>No Hp</th>
                    <th>Keperluan</th>
                    <th>Tanggal Datang</th>
                    <th>Aksi</th>
                </tr>
            </thead>   
            <tbody>
                @php
                    $key = 1;
                @endphp
                @foreach ($tamu as $tamu)
                <tr>
                
                    <th>
                        {{$key}}
                    </th>
                    <th>
                        {{$tamu->nama}}
                    </th>
                    <th>
                        @if ($tamu->kelamin == 'L')
                            Laki-Laki
                        @else
                            Perempuan
                        @endif
                        
                    </th>
                    <th>
                        {{$tamu->email}}
                    </th>
                    <th>
                        {{$tamu->noHp}}
                    </th>
                    <th>
                        {{$tamu->keperluan}}
                    </th>
                    <th>
                        {{$tamu->tanggalDatang}}
                    </th>
                    <th>
                        <div class="btn-group">
                            <a href="{{route('edit', $tamu->id)}}" class="btn btn-primary btn-sm">Edit</a>
                            <a href="{{route('detail', $tamu->id)}}" class="btn btn-warning btn-sm">Detail</a>
                            <form method="POST" action="{{route('destroy', $tamu->id)}}">
                                @csrf
                                @method('DELETE')
                                <button onclick="return confirm('Anda yakin?')" type="submit"  class="btn btn-danger btn-sm">Hapus Tamu</button>
                            </form>                       
                        </div>
                    </th>
                    
                        @php
                            $key++;
                        @endphp
                </tr>
                @endforeach
                
            </tbody>
            
        </table>
        @else
        <p>No Data</p>
        @endunless