<x-layout>
    <x-slot:title>Statistik Data</x-slot:title>
    <div class="card">
        <div class="card-header">
            <h3>Statistik Data Tamu Tahun {{$getYear}}</h3>
        </div>
        <div class="card-body">
            <form method="get">
                <div class="row align-items-center">
                    <div class="form-group col">
                        <label for="exampleSelectRounded0">Pilih Tahun Data Tamu</label>
                        <select name="year" class="custom-select rounded-0" id="exampleSelectRounded0">
                            @foreach ($yearList as $year)
                                <option
                                @if (request()->input('year') == null)
                                    @if ($year == date('Y')) 
                                    selected=""                                    
                                    @endif
                                @else
                                    @if ($year == request()->input('year'))
                                    selected = ""
                                    @endif
                                @endif
                                
                                    value="{{$year}}">
                                    {{$year}}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <button class="btn btn-outline-success h-25 col-3 mt-3" type="submit">Tampilkan</button>
                </div>
                
            </form>
            <x:statistic-chart :chartData="$chartData" :chartLabel="$chartLabel"></x:statistic-chart>
        </div>
    </div>
</x-layout>