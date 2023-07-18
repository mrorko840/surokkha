<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="{{ asset('assets/js/scripts.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
<script src="{{ asset('assets/assets/demo/chart-area-demo.js') }}"></script>
<script src="{{ asset('assets/assets/demo/chart-bar-demo.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
<script src="{{ asset('assets/js/datatables-simple-demo.js') }}"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
<!-- sweet alert -->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@stack('script')

<audio id="myAudio">
    <source src="{{asset('assets/notification.wav')}}" type="audio/wav">
</audio>

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>

<script>

    let admin = {{auth()->user()->isAdmin}};
    var audio = document.getElementById("myAudio");

    //-- Notify --//
    const notifyMsg = (msg,cls) => {
        Swal.fire({
            position: 'top-end',
            icon: cls,
            title: msg,
            toast:true,
            showConfirmButton: false,
            timer: 2800
        })
    }

    //-- Notify --//
    const rechargeNotify = () => {
        $.ajax({
            type: "get",
            url: "{{route('recharge.notify')}}",
            success: function (res) {
                let notify = $('.pendingCount').html();
                let count = res.count;

                if (count > notify) {
                    console.log('Play Sound');
                    audio.play();
                }

                console.log(res.count);
                $('.pendingCount').html(res.count);
            }
        });
    }

    if (admin === 1) {
        setInterval(() => {
            rechargeNotify();
        }, 5000);
    }




</script>
