@extends('admin.Layouts.master')
@section('title')
Dashboard
@endsection
@section('css')

@endsection
@section('js')

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
                    <h2 class="text-white font-weight-bold my-2 mr-5">Add Payment Member</h2>
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
                            <h3 class="card-title">Add Payment Member Create</h3>
                            <div class="card-toolbar">
                                <!--begin::Button-->
                                <a href="{{ url('/emi/list') }}" class="btn btn-primary font-weight-bolder">
                                    <i class="la la-list"></i>See Record</a>
                                <!--end::Button-->
                            </div>
                        </div>
                        <!--begin::Form-->
                        <form class="form" method="POST" action="">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label>Name:</label>
                                            <input type="text" class="form-control form-control-solid" placeholder="Enter Name" />
                                            <span class="form-text text-muted">Please enter your full name</span>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label>Ammount:</label>
                                            <input type="text" class="form-control form-control-solid" placeholder="Enter Mobile" />
                                            <span class="form-text text-muted">We'll never share your email with anyone else</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="reset" class="btn btn-primary mr-2">Submit</button>
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