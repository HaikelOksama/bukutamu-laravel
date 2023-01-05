<x-layout>
    <div class="card">
        <div class="card-header">
            <h2>Data Tamu {{$tamu->nama}}</h2>
            <small>Ditambahkan oleh {{$tamu->user->username}}</small>
        </div>
        <div class="card-footer">
            <a href="{{route('edit', $tamu->id)}}" class="btn btn-lg btn-primary">Edit Tamu</a>
            <a href="{{route('destroy', $tamu->id)}}" class="btn btn-lg btn-danger">Hapus Tamu</a>
        </div>
    </div>
</x-layout>
