@props(['tamu'])

<table>
    <thead>
        <tr>
            <table class="table table-bordered table-hover table-responsive-sm" id="example1">
                <thead>
                    <tr>   
                        <th>No</th>
                        <th>Nama</th> 
                        <th>Kelamin</th>
                        <th>Email</th>
                        <th>No Hp</th>
                        <th>Keperluan</th>
                        <th>Tanggal Datang</th>
                    </tr>
                </thead>   
                <tbody>
                    @php
                        $key = 1;
                    @endphp
                    @foreach ($tamu as $data)
                    <tr>
                    
                        <td>
                            {{$key}}
                        </td>
                        <td>
                            {{$data->nama}}
                        </td>
                        <td>
                            @if ($data->kelamin == 'L')
                                Laki-Laki
                            @else
                                Perempuan
                            @endif
                            
                        </td>
                        <td>
                            {{$data->email}}
                        </td>
                        <td>
                            {{$data->noHp}}
                        </td>
                        <td>
                            {{Str::limit($data->keperluan, 30, '...')}}
                        </td>
                        <td>
                            {{date('d-m-Y', strtotime($data->tanggalDatang));}}
                        </td>                                                              
                            @php
                                $key++;
                            @endphp
                    </tr>
                    @endforeach
        
                </tbody>
                
            </table>
        </tr>
    </thead>
</table>



