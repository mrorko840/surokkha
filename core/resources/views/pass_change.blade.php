@extends('layouts.master')

@section('content')
    <div class="container-fluid px-4">
        <h3 class="mt-4 mb-0">Change Password</h3>
        <ol class="breadcrumb mb-3">
            <li class="breadcrumb-item active">Home / Change Password</li>
        </ol>
        <div class="row">
            <div class="col-12">
                <div class="card mb-3 border border-2 border-info bg-white shadow">
                    <div class="card-header">
                        <h5 class="mb-0 text-info">
                            <i class="fa-solid fa-key"></i> Update Password
                        </h5>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('password.update') }}" id="passUpdate">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label mb-1 ms-1">Old Password</label>
                                <input type="password" class="form-control" name="current_password" placeholder="enter your old password">
                            </div>
                            <div class="mb-3">
                                <label class="form-label mb-1 ms-1">New Password</label>
                                <input type="password" class="form-control" name="password" placeholder="enter new password">
                            </div>
                            <div class="mb-3">
                                <label class="form-label mb-1 ms-1">Confirm New Password</label>
                                <input type="password" class="form-control" name="password_confirmation" placeholder="enter confirm password">
                            </div>
                            <button class="btn btn-info w-100" type="submit">Update Password</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('script')
<script>
    $(document).on('submit', '#passUpdate', function (e) {
        e.preventDefault();
        let formData = new FormData($(this)[0]);
        $.ajax({
            type: "post",
            url: "{{route('password.update')}}",
            data: formData,
            dataType: "json",
            contentType: false,
            processData: false,
            success: function (res) {
                // console.log(res);
                if (res.cls==='success') {
                    notifyMsg(res.msg,res.cls)
                    $('#passUpdate')[0].reset()
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
