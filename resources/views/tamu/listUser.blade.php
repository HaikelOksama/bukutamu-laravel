<x-layout>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">
                Daftar Tamu oleh user {{auth()->user()->username}}
            </h3>
            <div class="card-body">
                @unless (count($tamu) == 0)
                <ul>
                    @foreach ($tamu as $tamu)
                        <li><a href="{{Route('detail', $tamu->id)}}">{{$tamu->nama}}</a></li>
                    @endforeach

                </ul>
                @else
                <p>No Data</p> 
                @endunless

            </div>
        </div>
    </div>
</x-layout>