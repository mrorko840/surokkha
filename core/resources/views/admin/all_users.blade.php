@extends('layouts.master')

@section('content')

    <!-- notify -->
    @include('includes.notify')


    <div class="container-fluid px-4">
        <h3 class="mt-4 mb-0">All Users</h3>
        <ol class="breadcrumb mb-3">
            <li class="breadcrumb-item active">Home / All Users</li>
        </ol>
        <div class="row">
            <div class="col-12 mb-3">
                <marquee class="p-3 bg-white rounded border border-2 border-info">
                    {{ @$control->site_notice }}
                </marquee>
            </div>
            <div class="col-12">
                <div class="card mb-4 border border-2 border-info bg-white shadow">
                    <div class="card-header">
                        <div class="row">
                            <div class="col">
                                <i class="fas fa-table me-1"></i>
                                All Users
                            </div>
                            <div class="col-auto">
                                <a class="btn btn-sm btn-info setCostAllBtn">
                                    <i class="fa-solid fa-circle-dollar-to-slot"></i>
                                    Set Cost For All
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <table id="datatablesSimple">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Username</th>
                                    <th>Balance</th>
                                    <th>Cost</th>
                                    <th>Email</th>
                                    <th>Number</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Username</th>
                                    <th>Balance</th>
                                    <th>Cost</th>
                                    <th>Email</th>
                                    <th>Number</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach ($users as $k => $user)
                                    <tr>
                                        <td><b>{{ $k + 1 }}</b></td>
                                        <td>{{ $user->name }}</td>
                                        <td>
                                            <i class="fa-regular fa-user text-primary"></i>
                                            <span class="text-primary">{{ $user->username }}</span>
                                        </td>
                                        <td>
                                            <a class="btn btn-sm btn-success rounded-circle addBalanceBtn" data-id="{{ $user->id }}">
                                                <i class="fa-solid fa-plus"></i>
                                            </a>
                                            ৳{{ round($user->balance) }}
                                        </td>
                                        <td>
                                            <a class="btn btn-sm btn-orange rounded-circle setCostBtn" data-id="{{ $user->id }}">
                                                <i class="fa-solid fa-circle-dollar-to-slot"></i>
                                            </a>
                                            ৳ {{ round($user->cost) }}
                                        </td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->number }}</td>
                                        <td>
                                            <a class="btn btn-sm btn-danger rounded-circle dltBtn" data-id="{{ $user->id }}" data-action="{{ route('delete.user', $user->id) }}">
                                                <i class="fa-solid fa-trash"></i>
                                            </a>
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


    <!-- Modal Body -->
    <div class="modal fade" id="balanceModal" tabindex="-1" >
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTitleId"></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="balanceForm" method="post">
                        @csrf
                        <input type="hidden" name="user_id" class="add-bal-user-id">
                        <div class="mb-3">
                            <input type="text" class="form-control" name="balance">
                        </div>
                        <button class="btn btn-sm w-100 modalBtn"></button>
                    </form>
                </div>
            </div>
        </div>
    </div>




@endsection
@push('script')
    <script>
        // delete user
        $(document).on('click', '.dltBtn', function () {
            let id = $(this).data('id');
            let action = $(this).data('action');

            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    location.href = action;
                }
            })

        });


        // add balance
        const modal = $('#balanceModal')
        $(document).on('click', '.addBalanceBtn', function () {
            let id = $(this).data('id');

            $('#modalTitleId').html('Add Balance');
            $('.modalBtn').html('Add Balance').removeClass('btn-orange').removeClass('btn-info').addClass('btn-success');
            modal.modal('show');
            modal.find('[name="balance"]').attr('placeholder', 'enter amount to add');
            $('.balanceForm').attr('action', "{{route('add.balance')}}");
            $('.add-bal-user-id').val(id);

        });

        // set cost
        $(document).on('click', '.setCostBtn', function () {
            let id = $(this).data('id');

            $('#modalTitleId').html('Set Cost');
            $('.modalBtn').html('Set Cost').removeClass('btn-success').removeClass('btn-info').addClass('btn-orange');
            modal.modal('show');
            modal.find('[name="balance"]').attr('placeholder', 'enter amount to set cost');

            $('.balanceForm').attr('action', "{{route('set.cost')}}");
            $('.add-bal-user-id').val(id);

        });

        // set cost for all users
        $(document).on('click', '.setCostAllBtn', function () {
            $('#modalTitleId').html('Set Cost for All Users');
            $('.modalBtn').html('Set Cost for All').removeClass('btn-success').removeClass('btn-orange').addClass('btn-info');
            modal.modal('show');
            modal.find('[name="balance"]').attr('placeholder', 'enter amount to set cost');

            $('.balanceForm').attr('action', "{{route('set.cost.all')}}");
        });
    </script>
@endpush
