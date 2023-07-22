@extends('layouts.master')

@section('content')
    <div class="container-fluid px-4">
        <h3 class="mt-4 mb-0">New Card</h3>
        <ol class="breadcrumb mb-3">
            <li class="breadcrumb-item active">Home / Create New Card</li>
        </ol>
        <div class="row">
            <div class="col-12">
                <div class="card mb-3 border border-2 border-success bg-white shadow">
                    <div class="card-header">
                        <h4 class="mb-0 text-success text-center">
                            CREATE NEW FILE SUBMISSION
                        </h4>
                    </div>
                    <div class="card-body">
                        <form id="cardSubmit" action="{{route('new.card.store')}}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    <div class="row">
                                        <h5 class="mb-3 text-center text-decoration-underline">Beneficiary Information</h5>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label mb-1 ms-1">Certificate No :</label>
                                            <input type="text" class="form-control" name="certificate_no" id="certificate_no" value="{{'BD'.rand(100000000000, 999999999999)}}" placeholder="enter certificate number">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label mb-1 ms-1">Select One :</label>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="type" id="nid_radio" value="nid" checked>
                                                <label class="form-check-label" for="nid_radio">
                                                    NID No.
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="type" value="birth" id="birth_radio">
                                                <label class="form-check-label" for="birth_radio">
                                                    Birth No.
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label mb-1 ms-1">National ID :</label>
                                            <input type="text" class="form-control" name="nid_no" placeholder="enter your nid number">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label mb-1 ms-1">Birth No :</label>
                                            <input type="text" class="form-control" name="birth_no" placeholder="enter your birth certificate number">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label mb-1 ms-1">Passport No :</label>
                                            <input type="text" class="form-control" name="passport_no" placeholder="enter your passport number">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label mb-1 ms-1">Nationality :</label>
                                            <select class="form-select" name="nationality">
                                                <option value="Bangladeshi">Bangladeshi</option>
                                                <option value="India">India</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label mb-1 ms-1">Name :</label>
                                            <input type="text" class="form-control" name="name" placeholder="enter your name">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label mb-1 ms-1">Date of Birth :</label>
                                            <input type="text" class="form-control" name="dob" placeholder="dd-mm-yyyy">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label mb-1 ms-1">Gender :</label>
                                            <select class="form-select" name="gender">
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                            </select>
                                        </div>
                                    </div>

                                    <hr>

                                    <div class="row">
                                        <h5 class="mb-3 text-center text-decoration-underline">Vaccination Details</h5>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label mb-1 ms-1">Date of vaccination (Dose 1):</label>
                                            <input type="text" placeholder="dd-mm-yyyy" class="form-control" name="dose1date">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label mb-1 ms-1">Name Of Vaccine (Dose 1) :</label>
                                            <select class="form-select" name="dose1name">
                                                <option value="{{null}}">Select vaccsin name</option>
                                                @include('includes.vaccin_name_list')
                                            </select>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label mb-1 ms-1">Date of vaccination (Dose 2):</label>
                                            <input type="text" placeholder="dd-mm-yyyy" class="form-control" name="dose2date">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label mb-1 ms-1">Name Of Vaccine (Dose 2) :</label>
                                            <select class="form-select" name="dose2name">
                                                <option value="{{null}}">Select vaccsin name</option>
                                                @include('includes.vaccin_name_list')
                                            </select>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label mb-1 ms-1">Date of vaccination (Dose 3):</label>
                                            <input type="text" placeholder="dd-mm-yyyy" class="form-control" name="dose3date">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label mb-1 ms-1">Name Of Vaccine (Dose 3) :</label>
                                            <select class="form-select" name="dose3name">
                                                <option value="{{null}}">Select vaccsin name</option>
                                                @include('includes.vaccin_name_list')
                                            </select>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label mb-1 ms-1">Vaccination Center :</label>
                                            <select class="form-select vaccinCenter" name="vaccin_center" >
                                                <option value="{{null}}">Select Vaccsin Center</option>
                                                @include('includes.vaccin_center_list')
                                            </select>
                                            <input type="text" class="form-control mt-2 vaccinCenterOther d-none" placeholder="Enter Vaccsin Center Name">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label mb-1 ms-1">Vaccination By :</label>
                                            <input type="text" class="form-control" name="vaccin_by" value="Directorate General of Health Services (DGHS)">
                                        </div>
                                        {{-- <div class="col-md-6 mb-3">
                                            <label class="form-label mb-1 ms-1">Total Dose Given :</label>
                                            <input type="text" class="form-control" name="total_dose">
                                        </div> --}}
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label mb-1 ms-1">Total Dose Given :</label>
                                            <select class="form-select" name="total_dose">
                                                <option value="{{null}}">Select Total Dose Given</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>

                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-success w-100 my-3" type="submit">Make Card</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@push('script')
    <script>
        const card_cost = '{{ auth()->user()->cost }}';
        $(document).on('submit', '#cardSubmit', function(e) {
            e.preventDefault();
            let formData = new FormData($(this)[0]);
            Swal.fire({
                text: `কার্ডটি তৈরি করতে আপনার অ্যাকাউন্ট থেকে ${card_cost} টাকা কেটে নেওয়া হবে!`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, Make Card!'
            }).then((result) => {
                if (result.isConfirmed) {
                    addCardSubmit(formData);
                }
            })


        });

        // submit new card function
        const addCardSubmit = (formData) => {
            $.ajax({
                type: "post",
                url: "{{ route('new.card.store') }}",
                data: formData,
                dataType: "json",
                contentType: false,
                processData: false,
                success: function(res) {
                    notifyMsg(res.msg, res.cls)
                    if (res.cls === 'success') {
                        $('#cardSubmit')[0].reset()
                        $('#certificate_no').val("{{'BD'.rand(100000000000, 999999999999)}}");
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
        }



        $(document).on('change', '.vaccinCenter', function (e) {
            e.preventDefault();
            let value = $(this).val();
            if (value === 'other') {
                $(this).removeAttr('name');
                $('.vaccinCenterOther').attr('name', 'vaccin_center');
                $('.vaccinCenterOther').removeClass('d-none');
            } else {
                $('.vaccinCenterOther').removeAttr('name');
                $(this).attr('name', 'vaccin_center');
                $('.vaccinCenterOther').addClass('d-none');
            }

        });
    </script>
@endpush
