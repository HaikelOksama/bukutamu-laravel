@if (session()->has('message'))
    <script>
        Swal.fire({
        position: 'top',
        icon: 'success',
        title: "{{session('message')}}",
        showConfirmButton: false,
        timer: 1500
        })
    </script>
@endif