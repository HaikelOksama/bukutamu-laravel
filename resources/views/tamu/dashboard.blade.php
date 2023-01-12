<x-layout>
    <x-slot:title>Dashboard</x-slot:title>
    <section class="content">
        <div class="container-fluid">
          <!-- Small boxes (Stat box) -->
          <div class="row">
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-info">
                <div class="inner">
                  <h3>{{count($tamu)}}</h3>
  
                  <p>Seluruh Data Tamu</p>
                </div>
                <div class="icon">
                  <i class="ion ion-bag"></i>
                </div>
                <a href="{{url('index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-success">
                <div class="inner">
                  <h3>{{count($thisMonth)}}</h3>
  
                  <p>Tamu Bulan {{date('F')}} {{date('Y')}}</p>
                </div>
                <div class="icon">
                  <i class="ion ion-stats-bars"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-secondary">
                <div class="inner">
                  <h3>{{count($todayData)}}</h3>
  
                  <p>Tamu Masuk Hari Ini</p>
                </div>
                <div class="icon">
                  <i class="ion ion-person-add"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
    
          </div>
          <!-- /.row -->
          <!-- Main row -->
            <div class="row">
                <!-- Left col -->
                <section class="col-lg-7 connectedSortable">
                <!-- Custom tabs (Charts with tabs)-->
                    <div class="card">
                        <div class="card-header">
                        <h3 class="card-title">
                            <i class="fas fa-chart-pie mr-1"></i>
                            Tamu Tahun {{date('Y')}}
                        </h3>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <x:statistic-chart :chartData="$chartData" :chartLabel="$chartLabel"></x:statistic-chart>
                    
                        </div><!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </section>
                <section class="col-lg-5 connectedSortable">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                Tamu Terbaru
                            </h3>
                        </div>
                        <div class="card-body table-dashboard">
                            @unless (count($tamu) == 0)
                            <table class="table table-bordered " id="example1">
                                <thead>
                                    <tr>

                                        <th>No</th>
                                        <th>Nama</th> 
                                        <th>Kelamin</th>
                                        <th>Keperluan</th>
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
                                            {{Str::limit($tamu->keperluan, 30, '...')}}
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
                        </div>
                        <div class="card-footer">
                            Menampilkan 10 Data
                        </div>
                    </div>
                </section>
                    <!-- right col -->
            </div>
            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>
    <style>
        .table-dashboard {
            overflow-y: scroll !important;
            max-height: 345px !important;
        }
    </style>
</x-layout>