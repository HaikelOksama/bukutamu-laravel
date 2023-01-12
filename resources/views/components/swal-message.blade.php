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

@if(session()->has('deleted'))
<script>
   var Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });

    // Toast.fire({
    //     icon: 'success',
    //     title: "{{session('deleted')}}"
    //   })
</script>
@endif