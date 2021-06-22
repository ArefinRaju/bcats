@extends('admin.layouts.master')
@section('title')
    Dashboard
@endsection
@section('css')
    <link href="{{ asset('admin') }}/assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
@endsection
@section('js')
    <script src="{{ asset('admin') }}/assets/plugins/global/plugins.bundle.js"></script>
    <script>
        $("#kt_daterangepicker_3").daterangepicker({
            singleDatePicker: true,
            locale: {
                format: 'YYYY/MM/DD'
            }
        });

    </script>

@endsection
@section('content')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Subheader-->
        <div class="subheader py-2 py-lg-4 subheader-transparent" id="kt_subheader">
            <div class="container d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
                <!--begin::Info-->
                <div class="d-flex align-items-center flex-wrap mr-1">
                    <!--begin::Heading-->
                    <div class="d-flex flex-column">
                        <!--begin::Title-->
                        <h2 class="text-white font-weight-bold my-2 mr-5">EMI</h2>
                        <!--end::Title-->
                    </div>
                    <!--end::Heading-->
                </div>
                <!--end::Info-->

            </div>
        </div>
        <!--end::Subheader-->
        <!--begin::Entry-->
        <div class="d-flex flex-column-fluid">
            <!--begin::Container-->
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <!--begin::Card-->
                        <div class="card card-custom gutter-b example example-compact">
                            <div class="card-header">
                                <h3 class="card-title">EMI Create</h3>
                                <div class="card-toolbar">
                                    <!--begin::Button-->
                                    <a href="{{ url('/emi') }}" class="btn btn-primary font-weight-bolder">
                                        <i class="la la-list"></i>See Record</a>
                                    <!--end::Button-->
                                </div>
                            </div>
                            <!--begin::Form-->
                            <form class="form" method="POST" action="{{ url('emi') }}">
                                @csrf
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label for="name">Name:</label>
                                                <input type="text" name="name" id="name" class="form-control form-control-solid"
                                                       placeholder="Enter value" />
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label for="value">Value:</label>
                                                <input type="text" name="value" id="value" class="form-control form-control-solid"
                                                    placeholder="Enter value" />

                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label for="otp">OTP:</label>
                                                <select class="form-control form-control-solid" name="otp" id="otp">
                                                    <option value="0">No</option>
                                                    <option value="1">Yes</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label>Date:</label>
                                                <input name="date" class="form-control form-control-solid"
                                                    placeholder="Enter value" id="kt_daterangepicker_3" />

                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                    <button type="reset" class="btn btn-secondary">Cancel</button>
                                </div>
                            </form>
                            <!--end::Form-->
                        </div>
                        <!--end::Card-->
                    </div>
                </div>
            </div>
            <!--end::Container-->
        </div>
        <!--end::Entry-->
    </div>
@endsection
