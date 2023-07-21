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
                <marquee class="p-3 bg-white rounded border border-2 border-warning">
                    {{ @$control->site_notice }}
                </marquee>
            </div>
            <div class="col-12">
                <div class="card mb-4 border border-2 border-warning bg-white shadow">
                    <div class="card-header">
                        <i class="fas fa-table me-1"></i>
                        All Users
                    </div>
                    <div class="card-body">
                        <table id="datatablesSimple">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Username</th>
                                    <th>Balance</th>
                                    <th>Email</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Username</th>
                                    <th>Balance</th>
                                    <th>Email</th>
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
                                            ৳ {{ round($user->balance) }}
                                        </td>
                                        <td>{{ $user->email }}</td>
                                        <td>
                                            <a class="btn btn-sm btn-danger rounded-circle" href="#"><i class="fa-solid fa-trash"></i></a>
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
    <div class="modal fade" id="addBalanceModal" tabindex="-1" >
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTitleId">Add Balance</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{route('add.balance')}}" method="post">
                        @csrf
                        <input type="hidden" name="user_id" class="add-bal-user-id">
                        <div class="mb-3">
                            <input type="text" class="form-control" name="balance" placeholder="enter amount to add">
                        </div>
                        <button class="btn btn-sm btn-success w-100">Add Balance</button>
                    </form>
                </div>
            </div>
        </div>
    </div>




@endsection
@push('script')
    <script>
        $(document).on('click', '.addBalanceBtn', function () {
            let id = $(this).data('id');

            $('#addBalanceModal').modal('show');
            $('.add-bal-user-id').val(id);

        });
    </script>
@endpush
