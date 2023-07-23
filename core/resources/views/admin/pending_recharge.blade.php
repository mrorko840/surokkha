@extends('layouts.master')

@section('content')
    <div class="container-fluid px-4">
        <h3 class="mt-4 mb-0">Pending Recharge</h3>
        <ol class="breadcrumb mb-3">
            <li class="breadcrumb-item active">Home / Pending Recharge</li>
        </ol>
        <div class="row">
            <div class="col-12">
                <div class="card mb-3 border border-2 border-danger bg-white shadow">
                    <div class="card-header">
                        <h5 class="mb-0 text-danger">
                            <i class="fa-solid fa-clock-rotate-left"></i> All Pending Recharge Requests
                        </h5>
                    </div>
                    <div class="card-body">
                        <div id="tableLoad">
                            <table class="table">
                                <thead class="text-center">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Method</th>
                                        <th scope="col">Username</th>
                                        <th scope="col">Number</th>
                                        <th scope="col">Amount</th>
                                        <th scope="col">TRX Id</th>
                                        <th scope="col">Date & Time</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                    @foreach ($recharge as $k=>$item)
                                        <tr>
                                            <th scope="row">{{$k+1}}</th>
                                            <td>{{ $item->method }}</td>
                                            <td>{{ $item->user->name }}</td>
                                            <td>{{ $item->number }}</td>
                                            <td>{{ $item->amount }} Taka</td>
                                            <td><b class="text-primary">{{ $item->trx }}</b></td>
                                            <td>{{ date_format($item->created_at, 'M d, H:i a') }}</td>
                                            <td>
                                                <a class="btn btn-sm btn-success accpetBtn" data-id="{{ $item->id }}" href="javascript:void(0)"><i class="fa-solid fa-check"></i></a>
                                                <a class="btn btn-sm btn-danger cancelBtn" data-id="{{ $item->id }}" href="javascript:void(0)"><i class="fa-solid fa-xmark"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('script')
    <script>

        $(document).on('click', '.accpetBtn', function (e) {
            e.preventDefault();
            var id = $(this).data("id");
            console.log(id);
            Swal.fire({
                title: 'Are you sure?',
                icon: 'success',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, Accpet!'
                }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: "post",
                        url: "{{route('accpet.recharge')}}",
                        data: {id:id},
                        success: function (res) {
                            console.log(res);
                            notifyMsg(res.msg, res.cls)
                            $("#tableLoad").load(location.href+" #tableLoad"); //load table
                        }
                    });
                }
            })
        });

        $(document).on('click', '.cancelBtn', function (e) {
            e.preventDefault();
            var id = $(this).data("id");
            console.log(id);
            Swal.fire({
                title: 'Are you sure?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, Reject!'
                }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: "post",
                        url: "{{route('cancel.recharge')}}",
                        data: {id:id},
                        success: function (res) {
                            console.log(res);
                            notifyMsg(res.msg, res.cls)
                            $("#tableLoad").load(location.href+" #tableLoad"); //load table
                        }
                    });
                }
            })
        });
    </script>
@endpush
