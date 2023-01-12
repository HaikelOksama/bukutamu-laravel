<x-report>
    <x-slot:title>Kedatangan</x-slot:title>
    <style>
        .page-tamu {
            background-image: url('https://ptpn5.com/wp-content/uploads/2019/04/p.png');
            background-repeat: no-repeat;
            background-size: contain;
        }
    </style>
    <main class="page-tamu container-fluid" wire:ignore.self>
        <div class="container pt-3">
            <div class="card card-primary">
                <div class="card-header">
                    <center><h2>Selamat Datang di Kantor Pusat PTPN V</h2></center>
                    <center><h4>Silahkan isi data berikut sebelum melanjutkan</h4></center>
                </div>
                <div class="card-body">
                    <livewire:page-tamu></livewire:page-tamu>
                </div>
            </div>
        </div>
    </main>

    <x-slot:script>
    <script>
    window.livewire.on('tamuStored', () => {
        console.log('Tamu Baru')
        Swal.fire({
            icon: 'info',
            title: 'Sukses',
            text: 'Terimakasih telah mengisi data tamu, silahkan melapor ke pegawai di bagian Tamu',
        })
    })
    </script>
    </x-slot:script>
</x-report>