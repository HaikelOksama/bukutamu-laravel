<div>
    {{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day. --}}
    <x-swal-message></x-swal-message>

    <div class="card card-primary ">
        <h2 class="card-header">
            Filter Data Tamu
        </h2>
        <div class="card-body ">
            <div class="container">
                <h3>Filter data bulan</h3>
                <div class="row align-items-center">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="inputText" class="control-label mb-2 mr-2">Pilih Bulan</label>
                            <input wire:change="resetTimespan" wire:model="month" type="month" name="month" class="form-control" id="inputText" placeholder="Filter Data">
                        </div>
                    </div>
                </div>

            </div>
            <hr>
            <div class="container">
                <h3>Filter data Time span</h3>
                    <div class="row align-items-center">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="inputText" class="control-label mb-2 mr-2">Awal</label>
                                <input wire:change="resetMonth" wire:model="awal" type="date" name="awal" class="form-control" id="inputText" placeholder="Filter Data">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="inputText" class="control-label mb-2 mr-2">Akhir</label>
                                <input wire:change="resetMonth" wire:model="akhir" type="date" name="akhir" class="form-control" id="inputText" placeholder="Filter Data">
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>

    <livewire:create-tamu></livewire:create-tamu>
    @unless (count($tamu) == 0)
        <table class="table table-bordered table-hover table-responsive-sm" id="example1" wire:ignore.self>
            <thead wire:ignore.self>
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
                    <td>
                        <div class="btn-group">
                            <a href="{{route('edit', $data->id)}}" class="btn btn-primary btn-sm">Edit</a>
                            <a href="{{route('detail', $data->id)}}" class="btn btn-warning btn-sm">Detail</a>
                            <form wire:submit.prevent="destroy({{$data->id}})">

                                <button onclick="return confirm('Anda yakin?')" type="submit"  class="btn btn-danger btn-sm">Hapus</button>
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
        <div class="row justify-content-between">
            <div class="col-2 ">
                <div class="form-group">
                <label for="paginate">Data Ditampilkan</label>
                    <select class="form-control" wire:model="paginate" name="paginate" id="">
                        <option value="10">10</option>
                        <option value="20">20</option>
                        <option value="50">50</option>
                    </select>
                </div>
            </div>
                {{ $tamu->links() }}
            
        </div>
        @else
        <p>No Data</p>
    @endunless
    
    @section('datatable')
    <script src="{{ asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
    <script src="{{ asset('plugins/jszip/jszip.min.js')}}"></script>
    <script src="{{ asset('plugins/pdfmake/pdfmake.min.js')}}"></script>
    <script src="{{ asset('plugins/pdfmake/vfs_fonts.js')}}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
    <script>
        // $(function () {
        //   $("#example1").DataTable({
        //     "responsive": true, "lengthChange": false, "autoWidth": false,
        //     "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        //   }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
          
        // });
      </script>
    @endsection

</div>
