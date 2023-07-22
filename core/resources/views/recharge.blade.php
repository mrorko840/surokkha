@extends('layouts.master')

@section('content')
    <div class="container-fluid px-4">
        <h3 class="mt-4 mb-0">Recharge</h3>
        <ol class="breadcrumb mb-3">
            <li class="breadcrumb-item active">Home / Recharge</li>
        </ol>
        <div class="row">
            <div class="col-12">
                <div class="card mb-4 border border-2 border-danger bg-white">
                    <div class="card-body">
                        <h5 class="mb-2 text-danger">
                            <i class="fa-solid fa-bell text-danger"></i> Recharge Notice
                        </h5>

                        {!! @$control->recharge_notice !!}

                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="card mb-3 border border-2 border-danger bg-white">
                    <div class="card-header">
                        <h5 class="mb-0 text-danger">
                            <i class="fa-solid fa-sack-dollar"></i> Recharge Balance
                        </h5>
                    </div>
                    <div class="card-body">
                        <form id="newRecharge" action="{{ route('new.recharge') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label mb-1 ms-1">Select Method</label>
                                        <select class="form-select" name="method">
                                            <option value="{{null}}" selected>Select Payment Method</option>
                                            <option value="bKash">bKash</option>
                                            <option value="Nagad">Nagad</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label mb-1 ms-1">Your Number</label>
                                        <input type="text" class="form-control" name="number" placeholder="enter your number">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label mb-1 ms-1">Transaction ID</label>
                                        <input type="text" class="form-control" name="trx"
                                            placeholder="enter payment transaction id">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label mb-1 ms-1">Amount</label>
                                        <input type="number" class="form-control" name="amount"
                                            placeholder="enter amount you pay">
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-danger w-100" type="submit">Request Submit</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="card mb-3 border border-2 border-danger bg-white">
                    <div class="card-header">
                        <h5 class="mb-0 text-danger">
                            <i class="fa-solid fa-sack-dollar"></i> Recharge History
                        </h5>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead class="text-center">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Method</th>
                                    <th scope="col">Amount</th>
                                    <th scope="col">Trx Id</th>
                                    <th scope="col">Status</th>
                                </tr>
                            </thead>
                            <tbody class="text-center" id="rechargeTableBody">

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('script')
    <script>

        //getRechargeHistory
        const getRechargeHistory = () => {
            $.ajax({
                type: "GET",
                url: "{{route('get.recharge.history')}}",
                success: function (res) {
                    let recharge = res.data;
                    console.log(recharge);
                    let tabelRows = '';
                    let badgeCls = '';
                    let badgeTxt = '';
                    $.each(recharge, function (index, value) {
                        if (value.status === 0) {
                            badgeCls = 'danger';
                            badgeTxt = 'Rejected';
                        } else if (value.status ===1) {
                            badgeCls = 'success';
                            badgeTxt = 'Complete';
                        } else if (value.status === 2) {
                            badgeCls = 'warning';
                            badgeTxt = 'Pending';
                        }

                        tabelRows += `
                            <tr>
                                <th scope="row">${index+1}</th>
                                <td>${value.method}</td>
                                <td>${value.amount} Taka</td>
                                <td>${value.trx}</td>
                                <td><span class="badge text-bg-${badgeCls}">${badgeTxt}</span></td>
                            </tr>
                        `;
                    });

                    $('#rechargeTableBody').html(tabelRows);

                }
            });
        }

        getRechargeHistory()

        $(document).on('submit', '#newRecharge', function(e) {
            e.preventDefault();
            let formData = new FormData($(this)[0]);
            $.ajax({
                type: "post",
                url: "{{ route('new.recharge') }}",
                data: formData,
                dataType: "json",
                contentType: false,
                processData: false,
                success: function(res) {
                    notifyMsg(res.msg, res.cls)
                    if (res.cls === 'success') {
                        $('#newRecharge')[0].reset()
                        setTimeout(() => {
                            getRechargeHistory() //load tabel body again
                        }, 600);
                    }
                },
                error: function(err) {
                    let errors = err.responseJSON.errors;
                    let error = '';
                    let number = 1;
                    $.each(errors, function(index, value) {
                        error += (number++) + '. ' + value + '<br>'
                    });

                    notifyMsg(error, 'error')
                }
            });
        });
    </script>
@endpush
