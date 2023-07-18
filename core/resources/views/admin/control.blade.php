@extends('layouts.master')

@section('content')
    <div class="container-fluid px-4">
        <h3 class="mt-4 mb-0">Control Panel</h3>
        <ol class="breadcrumb mb-3">
            <li class="breadcrumb-item active">Home / Control Panel</li>
        </ol>
        <div class="row">
            <div class="col-4">
                <form class="controlUpdate" action="{{route('control.update')}}" method="POST">
                    @csrf
                    <div class="card mb-3 border border-2 border-success bg-white shadow">
                        <div class="card-header">
                            <h5 class="mb-0 text-success">
                                <i class="fa-solid fa-hand-holding-heart"></i> Minimum Recharge Limit
                            </h5>
                        </div>
                        <div class="card-body">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" value="{{$control->recharge_limit}}" name="recharge_limit" placeholder="enter min recharge limit">
                                <span class="input-group-text" id="basic-addon2">Taka</span>
                            </div>
                            <button class="btn btn-success w-100" type="submit">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-4">
                <form class="controlUpdate" action="{{route('control.update')}}" method="POST">
                    @csrf
                    <div class="card mb-3 border border-2 border-success bg-white shadow">
                        <div class="card-header">
                            <h5 class="mb-0 text-success">
                                <i class="fa-solid fa-credit-card"></i> Charge for Normal Card
                            </h5>
                        </div>
                        <div class="card-body">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" value="{{$control->charge_normal}}" name="charge_normal" placeholder="enter normal card charge">
                                <span class="input-group-text" id="basic-addon2">Taka</span>
                            </div>
                            <button class="btn btn-success w-100" type="submit">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-4">
                <form class="controlUpdate" action="{{route('control.update')}}" method="POST">
                    @csrf
                    <div class="card mb-3 border border-2 border-success bg-white shadow">
                        <div class="card-header">
                            <h5 class="mb-0 text-success">
                                <i class="fa-solid fa-credit-card"></i> Charge for Special Card
                            </h5>
                        </div>
                        <div class="card-body">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" value="{{$control->charge_special}}" name="charge_special" placeholder="enter special card charge">
                                <span class="input-group-text" id="basic-addon2">Taka</span>
                            </div>
                            <button class="btn btn-success w-100" type="submit">Submit</button>
                        </div>
                    </div>
                </form>
            </div>

            <div class="col-12">
                <form class="controlUpdate" action="{{route('control.update')}}" method="POST">
                    @csrf
                    <div class="card mb-3 border border-2 border-success bg-white shadow">
                        <div class="card-header">
                            <h5 class="mb-0 text-success">
                                <i class="fa-solid fa-headset"></i> Customer Support Link
                            </h5>
                        </div>
                        <div class="card-body">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" value="{{$control->support_link}}" name="support_link" placeholder="enter your telegram or whatsapp link">
                            </div>
                            <button class="btn btn-success w-100" type="submit">Submit</button>
                        </div>
                    </div>
                </form>
            </div>

            <div class="col-6">
                <form class="controlUpdate" action="{{route('control.update')}}" method="POST">
                    @csrf
                    <div class="card mb-3 border border-2 border-success bg-white shadow">
                        <div class="card-header">
                            <h5 class="mb-0 text-success">
                                <i class="fa-solid fa-comments-dollar"></i> Recharge Notice
                            </h5>
                        </div>
                        <div class="card-body">
                            <div class="input-group mb-3">
                                <textarea name="recharge_notice" class="form-control" id="" cols="30" rows="5">{{$control->recharge_notice}}</textarea>
                            </div>
                            <button class="btn btn-success w-100" type="submit">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-6">
                <form class="controlUpdate" action="{{route('control.update')}}" method="POST">
                    @csrf
                    <div class="card mb-3 border border-2 border-success bg-white shadow">
                        <div class="card-header">
                            <h5 class="mb-0 text-success">
                                <i class="fa-solid fa-triangle-exclamation"></i> Site Notice
                            </h5>
                        </div>
                        <div class="card-body">
                            <div class="input-group mb-3">
                                <textarea name="site_notice" class="form-control" id="" cols="30" rows="5">{{$control->site_notice}}</textarea>
                            </div>
                            <button class="btn btn-success w-100" type="submit">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@push('script')
<script>
    $(document).on('submit', '.controlUpdate', function (e) {
        e.preventDefault();
        let formData = new FormData($(this)[0]);
        $.ajax({
            type: "POST",
            url: "{{route('control.update')}}",
            data: formData,
            dataType: "json",
            contentType: false,
            processData: false,
            success: function (res) {
                // console.log(res);
                if (res.cls==='success') {
                    notifyMsg(res.msg,res.cls)
                }
            },
            error: function (err) {
                let errors= err.responseJSON.errors;
                let error = '';
                let number = 1;
                $.each(errors, function (index, value) {
                    error += (number++)+'. '+value+'<br>'
                });

                notifyMsg(error,'error')
            }
        });

    });
</script>
@endpush
