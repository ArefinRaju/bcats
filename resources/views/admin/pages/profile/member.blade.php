@php

    $emiPaidAmount = 0;
    $emiDueAmount = 0;

    foreach ($data['emi'] as $emi){
        $emiPaidAmount += $emi->paid;
        $emiDueAmount += $emi->due;
    }

    $emiTotalAmount = $emiPaidAmount + $emiDueAmount;

    $otpPaidAmount = 0;
    $otpDueAmount = 0;

    foreach ($data['otp'] as $otp){
        $otpPaidAmount += $otp->paid;
        $otpDueAmount += $otp->due;
    }

    $optTotalAmount = $otpPaidAmount + $otpDueAmount;


@endphp


@extends('admin.layouts.master')
@section('title')
    Dashboard
@endsection
@section('css')

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
                        <h2 class="text-white font-weight-bold my-2 mr-5">Project Member</h2>
                        <!--end::Title-->
                    </div>
                    <!--end::Heading-->
                </div>
                <!--end::Info-->

            </div>
        </div>
        <!--end::Subheader-->
        <!--begin::Entry-->
        <div class="d-flex flex-column-fluid" id="vue_app">
            <!--begin::Container-->
            <div class="container">
                <!--begin::Card-->
                <div class="card card-custom gutter-b">
                    <div class="card-body">
                        <!--begin::Details-->
                        <div class="d-flex mb-9">
                            <!--begin: Pic-->
                            <div class="flex-shrink-0 mr-7 mt-lg-0 mt-3">
                                <div class="symbol symbol-50 symbol-lg-120">
                                    <img src="{{asset('admin')}}/assets/media/users/300_1.jpg" alt="image">
                                </div>
                                <div class="symbol symbol-50 symbol-lg-120 symbol-primary d-none">
                                    <span class="font-size-h3 symbol-label font-weight-boldest">JM</span>
                                </div>
                            </div>
                            <!--end::Pic-->
                            <!--begin::Info-->
                            <div class="flex-grow-1">
                                <!--begin::Title-->
                                <div class="d-flex justify-content-between flex-wrap mt-1">
                                    <div class="d-flex mr-3">
                                        <a href="#"
                                           class="text-dark-75 text-hover-primary font-size-h5 font-weight-bold mr-3">{!! $data['user']->name !!}</a>
                                        <a href="#">
                                            <i class="flaticon2-correct text-success font-size-h5"></i>
                                        </a>
                                    </div>
                                    <div class="my-lg-0 my-3">
                                        <button @click="addEmi()"
                                                class="btn btn-sm btn-light-success font-weight-bolder text-uppercase mr-3">Pay EMI
                                        </button>
                                        <button @click="addOtp() = !addTransaction"
                                                class="btn btn-sm btn-light-success font-weight-bolder text-uppercase mr-3">Pay OTP
                                        </button>
                                    </div>
                                </div>
                                <!--end::Title-->
                                <!--begin::Content-->
                                <div class="d-flex flex-wrap justify-content-between mt-1">
                                    <div class="d-flex flex-column flex-grow-1 pr-8">
                                        <div class="d-flex flex-wrap mb-4">
                                            <a href="#"
                                               class="text-dark-50 text-hover-primary font-weight-bold mr-lg-8 mr-5 mb-lg-0 mb-2">
                                                <i class="flaticon2-new-email mr-2 font-size-lg"></i>{{$data['user']->email}}</a>
                                            <a href="#"
                                               class="text-dark-50 text-hover-primary font-weight-bold mr-lg-8 mr-5 mb-lg-0 mb-2">
                                                <i class="flaticon2-calendar-3 mr-2 font-size-lg"></i>{{$data['role']}}
                                            </a>
                                            {{-- <a href="#" class="text-dark-50 text-hover-primary font-weight-bold">
                                                <i class="flaticon2-placeholder mr-2 font-size-lg"></i>{{$}}</a> --}}
                                        </div>
                                        <span
                                            class="font-weight-bold text-dark-50">I distinguish three main text objectives could be merely to inform people.</span>
                                        <span
                                            class="font-weight-bold text-dark-50">A second could be persuade people.You want people to bay objective</span>
                                    </div>
                                    <div class="d-flex align-items-center w-25 flex-fill float-right mt-lg-12 mt-8">
                                        <span class="font-weight-bold text-dark-75">Progress</span>
                                        <div class="progress progress-xs mx-3 w-100">
                                            <div class="progress-bar bg-success" role="progressbar" style="width: 63%;"
                                                 aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <span class="font-weight-bolder text-dark">78%</span>
                                    </div>
                                </div>
                                <!--end::Content-->
                            </div>
                            <!--end::Info-->
                        </div>
                        <!--end::Details-->
                        <div class="separator separator-solid"></div>
                        <!--begin::Items-->
                        <div class="d-flex align-items-center flex-wrap mt-8">
                            <!--begin::Item-->
                            <div class="d-flex align-items-center flex-lg-fill mr-5 mb-2">
                            <span class="mr-4">
                                <i class="flaticon-file-2 display-4 text-muted font-weight-bold"></i>
                            </span>
                                <div class="d-flex flex-column flex-lg-fill">
                                    <span class="text-dark-75 font-weight-bolder font-size-sm">OTP</span>
                                    <a href="#"
                                       class="text-primary font-weight-bolder">{!! $data['otp']->count() !!}</a>
                                </div>
                            </div>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <div class="d-flex align-items-center flex-lg-fill mr-5 mb-2">
                            <span class="mr-4">
                                <i class="flaticon-confetti display-4 text-muted font-weight-bold"></i>
                            </span>
                                <div class="d-flex flex-column text-dark-75">
                                    <span class="font-weight-bolder font-size-sm">Total Amount</span>
                                    <span class="font-weight-bolder font-size-h5">
                                    <span class="text-dark-50 font-weight-bold"></span>{!! $optTotalAmount !!} TK</span>
                                </div>
                            </div>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <div class="d-flex align-items-center flex-lg-fill mr-5 mb-2">
                            <span class="mr-4">
                                <i class="flaticon-pie-chart display-4 text-muted font-weight-bold"></i>
                            </span>
                                <div class="d-flex flex-column text-dark-75">
                                    <span class="font-weight-bolder font-size-sm">Paid</span>
                                    <span class="font-weight-bolder font-size-h5">
                                    <span class="text-dark-50 font-weight-bold"></span>{!! $otpPaidAmount !!} TK</span>
                                </div>
                            </div>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <div class="d-flex align-items-center flex-lg-fill mr-5 mb-2">
                            <span class="mr-4">
                                <i class="flaticon-pie-chart display-4 text-muted font-weight-bold"></i>
                            </span>
                                <div class="d-flex flex-column text-dark-75">
                                    <span class="font-weight-bolder font-size-sm">Due</span>
                                    <span class="font-weight-bolder font-size-h5">
                                    <span
                                        class="text-dark-50 font-weight-bold"></span>{!! $otpDueAmount !!} TK</span>
                                </div>
                            </div>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <div class="d-flex align-items-center flex-lg-fill mr-5 mb-2">
                            <span class="mr-4">
                                <i class="flaticon-chat-1 display-4 text-muted font-weight-bold"></i>
                            </span>
                                <div class="d-flex flex-column">
                                    <span class="text-dark-75 font-weight-bolder font-size-sm">Transaction</span>
                                    <a href="#"
                                       class="text-primary font-weight-bolder">{!! $data['otpTransactionList']->count() !!} View</a>
                                </div>
                            </div>
                            <!--end::Item-->
                        </div>
                        <!--begin::Items-->
                        <div class="separator separator-solid"></div>
                        <!--begin::Items-->
                        <div class="d-flex align-items-center flex-wrap mt-8">
                            <!--begin::Item-->
                            <div class="d-flex align-items-center flex-lg-fill mr-5 mb-2">
                            <span class="mr-4">
                                <i class="flaticon-file-2 display-4 text-muted font-weight-bold"></i>
                            </span>
                                <div class="d-flex flex-column flex-lg-fill">
                                    <span class="text-dark-75 font-weight-bolder font-size-sm">EMI</span>
                                    <a href="#"
                                       class="text-primary font-weight-bolder">{!! $data['emi']->count() !!}</a>
                                </div>
                            </div>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <div class="d-flex align-items-center flex-lg-fill mr-5 mb-2">
                            <span class="mr-4">
                                <i class="flaticon-confetti display-4 text-muted font-weight-bold"></i>
                            </span>
                                <div class="d-flex flex-column text-dark-75">
                                    <span class="font-weight-bolder font-size-sm">Total Amount</span>
                                    <span class="font-weight-bolder font-size-h5">
                                    <span class="text-dark-50 font-weight-bold"></span>{!! $emiTotalAmount !!} TK</span>
                                </div>
                            </div>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <div class="d-flex align-items-center flex-lg-fill mr-5 mb-2">
                            <span class="mr-4">
                                <i class="flaticon-pie-chart display-4 text-muted font-weight-bold"></i>
                            </span>
                                <div class="d-flex flex-column text-dark-75">
                                    <span class="font-weight-bolder font-size-sm">Paid</span>
                                    <span class="font-weight-bolder font-size-h5">
                                    <span class="text-dark-50 font-weight-bold"></span>{!! $emiPaidAmount !!} TK</span>
                                </div>
                            </div>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <div class="d-flex align-items-center flex-lg-fill mr-5 mb-2">
                            <span class="mr-4">
                                <i class="flaticon-pie-chart display-4 text-muted font-weight-bold"></i>
                            </span>
                                <div class="d-flex flex-column text-dark-75">
                                    <span class="font-weight-bolder font-size-sm">Due</span>
                                    <span class="font-weight-bolder font-size-h5">
                                    <span
                                        class="text-dark-50 font-weight-bold"></span>{!! $emiDueAmount !!} TK</span>
                                </div>
                            </div>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <div class="d-flex align-items-center flex-lg-fill mr-5 mb-2">
                            <span class="mr-4">
                                <i class="flaticon-chat-1 display-4 text-muted font-weight-bold"></i>
                            </span>
                                <div class="d-flex flex-column">
                                    <span class="text-dark-75 font-weight-bolder font-size-sm">Transaction</span>
                                    <a href="#"
                                       class="text-primary font-weight-bolder">{!! $data['emiTransactionList']->count() !!} View</a>
                                </div>
                            </div>
                            <!--end::Item-->
                        </div>
                        <!--begin::Items-->
                    </div>
                </div>
                <!--end::Card-->
                <!--begin::Row-->
                <div class="row">
                    <div class="col-lg-12">
                        <!--begin::Advance Table Widget 2-->
                        <div class="card card-custom card-stretch gutter-b" v-if="add_emi">
                            <!--begin::Header-->
                            <div class="card-header border-0 pt-5">
                                <h3 class="card-title align-items-start flex-column">
                                    <span class="card-label font-weight-bolder text-dark">Pay Fund(EMI)</span>
                                    <!-- <span class="text-muted mt-3 font-weight-bold font-size-sm">More than 400+ new members</span> -->
                                </h3>
                                <div class="card-toolbar">

                                </div>
                            </div>
                            <!--end::Header-->
                            <!--begin::Body-->
                            <div class="card-body pt-3 pb-0">
                                <!--begin::Form-->
                                <form class="form" method="POST" action="{{url('addFund')}}"
                                      enctype="multipart/form-data">
                                    @csrf
                                    <div class="card-body">
                                        <div class="row">
                                            <input type="hidden" name="byUser" id="" value="{{$data['user']->id}}">
{{--                                            <div class="col-lg-4">--}}
{{--                                                <div class="form-group">--}}
{{--                                                    <label for="byUser">By User</label>--}}
{{--                                                    <select name="byUser" id="" class="form-control">--}}
{{--                                                        @foreach($data['users'] as $user)--}}
{{--                                                            <option value="{{$user->id}}" @if($data['user']->id == $user->id) selected @endif>{{$user->name}}</option>--}}
{{--                                                        @endforeach--}}
{{--                                                    </select>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label for="byUser">Select Emi</label>
                                                    <select name="emiId" id="emiId" class="form-control">
                                                        @foreach($data['emiList'] as $emi)
                                                            <option value="{{$emi->id}}">{{$emi->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label for="amount">Amount(Tk):</label>
                                                    <input type="text" id="amount" name="amount"
                                                           class="form-control form-control-solid"
                                                           placeholder="Enter Amount"/>

                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label for="image">Image:</label>
                                                    <input type="file" name="image" id="image"
                                                           class="form-control form-control-solid"
                                                           placeholder="Enter Amount"/>

                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label for="amount">Commend:</label>
                                                    <input type="text" id="commend" name="commend"
                                                           class="form-control form-control-solid"
                                                           placeholder="Enter Commend"/>

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
                            <!--end::Body-->
                        </div>
                        <!--end::Advance Table Widget 2-->
                    </div>
                </div>
                <!--end::Row-->
                <!--begin::Row-->
                <div class="row">
                    <div class="col-lg-12">
                        <!--begin::Advance Table Widget 2-->
                        <div class="card card-custom card-stretch gutter-b" v-if="add_otp">
                            <!--begin::Header-->
                            <div class="card-header border-0 pt-5">
                                <h3 class="card-title align-items-start flex-column">
                                    <span class="card-label font-weight-bolder text-dark">Pay OTP</span>
                                    <!-- <span class="text-muted mt-3 font-weight-bold font-size-sm">More than 400+ new members</span> -->
                                </h3>

                            </div>
                            <!--end::Header-->
                            <!--begin::Body-->
                            <div class="card-body pt-3 pb-0">
                                <!--begin::Form-->
                                <form class="form" method="POST" action="{{url('addFund')}}"
                                      enctype="multipart/form-data">
                                    @csrf
                                    <div class="card-body">
                                        <div class="row">
                                            <input type="hidden" name="byUser" id="" value="{{$data['user']->id}}">
                                            {{--                                            <div class="col-lg-4">--}}
{{--                                                <div class="form-group">--}}
{{--                                                    <label for="byUser">By User</label>--}}
{{--                                                    <select name="byUser" id="byUser" class="form-control">--}}
{{--                                                        @foreach($data['users'] as $user)--}}
{{--                                                            <option value="{{$user->id}}">{{$user->name}}</option>--}}
{{--                                                        @endforeach--}}
{{--                                                    </select>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label for="byUser">Select Otp</label>
                                                    <select name="emiId" id="emiId" class="form-control">
                                                        @foreach($data['otpList'] as $otp)
                                                            <option value="{{$otp->id}}">{{$otp->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label for="amount">Amount(TK):</label>
                                                    <input type="text" id="amount" name="amount"
                                                           class="form-control form-control-solid"
                                                           placeholder="Enter Amount"/>

                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label for="image">Image:</label>
                                                    <input type="file" name="image" id="image"
                                                           class="form-control form-control-solid"
                                                           placeholder="Enter Amount"/>

                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label for="amount">Commend:</label>
                                                    <input type="text" id="commend" name="commend"
                                                           class="form-control form-control-solid"
                                                           placeholder="Enter Commend"/>

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
                            <!--end::Body-->
                        </div>
                        <!--end::Advance Table Widget 2-->
                    </div>
                </div>
                <!--end::Row-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::Entry-->
    </div>
@endsection
@section('js')
    <script src="{{ asset('vue-js/vue/dist/vue.js') }}"></script>
    <script src="{{ asset('vue-js/axios/dist/axios.min.js') }}"></script>
    <script src="{{ asset('vue-js/bootstrap-select/dist/js/bootstrap-select.min.js') }}"></script>
    <script src="{{ URL::asset('assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>
    <script>
        $(document).ready(function () {
            var vue = new Vue({
                el: '#vue_app',
                data: {
                    config: {
                        get_category_wise_sub_category_product_url: "{{ url('fetch-sub-category-product-info') }}",

                    },
                    category_id: '',
                    add_emi: false,
                    add_otp: false,
                    sub_categories: [],
                },
                methods: {
                    addOtp() {
                        var vm = this;
                        vm.add_emi = false;
                        vm.add_otp = true;
                    },
                    addEmi() {
                        var vm = this;
                        vm.add_emi = true;
                        vm.add_otp = false;
                    },
                    fetch_sub_category_and_product() {
                        var vm = this;
                        var slug = vm.category_id;
                        if (slug) {
                            axios.get(this.config.get_category_wise_sub_category_product_url + '/' + slug).then(function (response) {
                                vm.sub_categories = response.data.subCategory;
                            }).catch(function (error) {
                                toastr.error('Something went to wrong', {
                                    closeButton: true,
                                    progressBar: true,
                                });
                                return false;
                            });
                        }
                    },


                },
                updated() {
                    $('.bSelect').selectpicker('refresh');
                }
            });

            $('.bSelect').selectpicker({
                liveSearch: true,
                size: 5
            });
            $('.datepicker').datepicker({
                format: 'dd-mm-yyyy'
            });

        });
    </script>
@endsection
