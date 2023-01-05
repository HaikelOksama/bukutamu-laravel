
<x-layout>
    <div class="container p-5">
        <div class="card">
            <div class="card-header">
                <h2>Data Tamu Kantor Pusat</h2>
            </div>
            <div class="card-body">

                <x-tamu-table :tamu="$tamu" />
            </div>
        </div>
    </div>
</x-layout>

