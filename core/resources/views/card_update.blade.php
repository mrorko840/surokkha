@extends('layouts.master')

@section('content')
    <div class="container-fluid px-4">
        <h3 class="mt-4 mb-0">Update Card</h3>
        <ol class="breadcrumb mb-3">
            <li class="breadcrumb-item active">Home / Update Card</li>
        </ol>
        <div class="row">
            <div class="col-12">
                <div class="card mb-3 border border-2 border-success bg-white shadow">
                    <div class="card-header">
                        <h4 class="mb-0 text-success text-center">
                            UPDATE CARD NOW
                        </h4>
                    </div>
                    <div class="card-body">
                        <form id="cardSubmit" action="{{route('card.update', Crypt::encryptString($card->id))}}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    <div class="row">
                                        <h5 class="mb-3 text-center text-decoration-underline">Beneficiary Information</h5>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label mb-1 ms-1">Certificate No :</label>
                                            <input type="text" class="form-control" name="certificate_no" id="certificate_no" value="{{$card->certificate_no}}" placeholder="enter certificate number" disabled readonly>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label mb-1 ms-1">Select One :</label>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="type" id="nid_radio" value="nid" @checked($card->type == 'nid')>
                                                <label class="form-check-label" for="nid_radio">
                                                    NID No.
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="type" value="birth" id="birth_radio" @checked($card->type == 'birth')>
                                                <label class="form-check-label" for="birth_radio">
                                                    Birth No.
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label mb-1 ms-1">National ID :</label>
                                            <input type="text" class="form-control" name="nid_no" value="{{$card->nid_no}}" placeholder="enter your nid number">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label mb-1 ms-1">Birth No :</label>
                                            <input type="text" class="form-control" name="birth_no" value="{{$card->birth_no}}" placeholder="enter your birth certificate number">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label mb-1 ms-1">Passport No :</label>
                                            <input type="text" class="form-control" name="passport_no" value="{{$card->passport_no}}" placeholder="enter your passport number">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label mb-1 ms-1">Nationality :</label>
                                            <select class="form-select" name="nationality">
                                                <option @selected($card->nationality == 'Bangladeshi') value="Bangladeshi">Bangladeshi</option>
                                                <option @selected($card->nationality == 'India') value="India">India</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label mb-1 ms-1">Name :</label>
                                            <input type="text" class="form-control" name="name" value="{{$card->name}}" placeholder="enter your name">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label mb-1 ms-1">Date of Birth :</label>
                                            <input type="text" class="form-control" name="dob" value="{{ date_format(date_create($card->dob), 'd-m-Y') }}" placeholder="dd-mm-yyyy">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label mb-1 ms-1">Gender :</label>
                                            <select class="form-select" name="gender">
                                                <option @selected($card->gender == 'Male') value="Male">Male</option>
                                                <option @selected($card->gender == 'Female') value="Female">Female</option>
                                            </select>
                                        </div>
                                    </div>

                                    <hr>

                                    <div class="row">
                                        <h5 class="mb-3 text-center text-decoration-underline">Vaccination Details</h5>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label mb-1 ms-1">Date of vaccination (Dose 1):</label>
                                            <input type="text" placeholder="dd-mm-yyyy" class="form-control" value="{{ date_format(date_create($card->dose1date), 'd-m-Y') }}" name="dose1date">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label mb-1 ms-1">Name Of Vaccine (Dose 1) :</label>
                                            <input type="text" class="form-control" name="dose1name" value="{{ $card->dose1name }}" placeholder="Enter vaccsin name">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label mb-1 ms-1">Date of vaccination (Dose 2):</label>
                                            <input type="text" placeholder="dd-mm-yyyy" class="form-control" value="{{ date_format(date_create($card->dose2date), 'd-m-Y') }}" name="dose2date">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label mb-1 ms-1">Name Of Vaccine (Dose 2) :</label>
                                            <input type="text" class="form-control" name="dose2name" value="{{ $card->dose2name }}" placeholder="Enter vaccsin name">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label mb-1 ms-1">Date of vaccination (Dose 3):</label>
                                            <input type="text" placeholder="dd-mm-yyyy" class="form-control" value="{{ date_format(date_create($card->dose3date), 'd-m-Y') }}" name="dose3date">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label mb-1 ms-1">Name Of Vaccine (Dose 3) :</label>
                                            <input type="text" class="form-control" name="dose3name" value="{{ $card->dose3name }}" placeholder="Enter vaccsin name">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label mb-1 ms-1">Vaccination Center :</label>
                                            <input type="text" class="form-control" name="vaccin_center" value="{{ $card->vaccin_center }}" placeholder="Enter Vaccsin Center Name">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label mb-1 ms-1">Vaccination By :</label>
                                            <input type="text" class="form-control" name="vaccin_by" value="Directorate General of Health Services (DGHS)">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label mb-1 ms-1">Total Dose Given :</label>
                                            <select class="form-select" name="total_dose">
                                                <option @selected($card->total_dose == null) value="{{null}}">Select Total Dose Given</option>
                                                <option @selected($card->total_dose == 1) value="1">1</option>
                                                <option @selected($card->total_dose == 2) value="2">2</option>
                                                <option @selected($card->total_dose == 3) value="3">3</option>

                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-success w-100 my-3" type="submit">Update Card</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@push('script')
    <script>
        const card_cost = '{{ $control->charge_update }}';
        $(document).on('submit', '#cardSubmit', function(e) {
            e.preventDefault();
            let url = $(this).attr('action');
            let formData = new FormData($(this)[0]);
            Swal.fire({
                text: `কার্ডটি পরিবর্তন করতে আপনার অ্যাকাউন্ট থেকে ${card_cost} টাকা কেটে নেওয়া হবে!`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, Make Card!'
            }).then((result) => {
                if (result.isConfirmed) {
                    CardUpdate(formData, url);
                }
            })


        });

        // submit new card function
        const CardUpdate = (formData, url) => {
            $.ajax({
                type: "post",
                url: url,
                data: formData,
                dataType: "json",
                contentType: false,
                processData: false,
                success: function(res) {
                    notifyMsg(res.msg, res.cls)
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
    </script>
@endpush
