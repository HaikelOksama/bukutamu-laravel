<x-report>
    <x-slot:title>{{$heading}}</x-slot:title>
    <center><h2><u>{{$heading}}</u></h2></center>
    <br>
    <br>
    <x:table-laporan :tamu="$tamu"></x:table-laporan>

    <x-slot:script>
        <script>
            $(document).ready(function () {
                window.print()
            })
        </script>
    </x-slot:script>

</x-report>