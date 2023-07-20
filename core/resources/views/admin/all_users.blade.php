@extends('layouts.master')

@section('content')
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
                                    {{-- <th>Date of Birth</th> --}}
                                    {{-- <th>Nationality</th> --}}
                                    {{-- <th>Gender</th> --}}
                                    <th>Certificate No</th>
                                    <th>Created</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Username</th>
                                    {{-- <th>Date of Birth</th> --}}
                                    {{-- <th>Nationality</th> --}}
                                    {{-- <th>Gender</th> --}}
                                    <th>Certificate No</th>
                                    <th>Created</th>
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
                                        {{-- <td>{{ date_format(date_create($user->dob), 'd/m/Y') }}</td> --}}
                                        {{-- <td>{{ $user->nationality }}</td> --}}
                                        {{-- <td>{{ $user->gender }}</td> --}}
                                        <td><b>#{{ $user->certificate_no }}</b></td>
                                        <td>{{ date_format(date_create($user->created_at), 'd/m/Y') }}</td>
                                        <td>
                                            <a class="btn btn-sm btn-danger rounded-circle" href="#">
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
@endsection
