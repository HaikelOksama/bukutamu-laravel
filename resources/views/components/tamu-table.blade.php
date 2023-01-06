@props(['tamu'])

@unless (count($tamu) == 0)
        <table class="table table-bordered" id="example1">
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
                
                    <td>
                        {{$key}}
                    </td>
                    <td>
                        {{$tamu->nama}}
                    </td>
                    <td>
                        @if ($tamu->kelamin == 'L')
                            Laki-Laki
                        @else
                            Perempuan
                        @endif
                        
                    </td>
                    <td>
                        {{$tamu->email}}
                    </td>
                    <td>
                        {{$tamu->noHp}}
                    </td>
                    <td>
                        {{Str::limit($tamu->keperluan, 30, '...')}}
                    </td>
                    <td>
                        {{date('d-m-Y', strtotime($tamu->tanggalDatang));}}
                    </td>
                    <td>
                        <div class="btn-group">
                            <a href="{{route('edit', $tamu->id)}}" class="btn btn-primary btn-sm">Edit</a>
                            <a href="{{route('detail', $tamu->id)}}" class="btn btn-warning btn-sm">Detail</a>
                            <form method="POST" action="{{route('destroy', $tamu->id)}}">
                                @csrf
                                @method('DELETE')
                                <button onclick="return confirm('Anda yakin?')" type="submit"  class="btn btn-danger btn-sm">Hapus Tamu</button>
                            </form>                       
                        </div>
                    </td>
                    
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