@extends('admin.layouts.master')
@section('title')
Dashboard
@endsection
@section('css')

@endsection
@section('js')
<script src="{{asset('admin')}}/assets/plugins/custom/fullcalendar/fullcalendar.bundle.js?v=7.0.4"></script>
<script src="{{asset('admin')}}/assets/js/pages/widgets.js?v=7.0.4"></script>
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
                    <h2 class="text-white font-weight-bold my-2 mr-5">Dashboard</h2>
                    <!--end::Title-->
                    <!--begin::Breadcrumb-->
                    <div class="d-flex align-items-center font-weight-bold my-2">
                        <!--begin::Item-->
                        <a href="#" class="opacity-75 hover-opacity-100">
                            <i class="flaticon2-shelter text-white icon-1x"></i>
                        </a>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <span class="label label-dot label-sm bg-white opacity-75 mx-3"></span>
                        <a href="" class="text-white text-hover-white opacity-75 hover-opacity-100">Dashboard</a>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <span class="label label-dot label-sm bg-white opacity-75 mx-3"></span>
                        <a href="" class="text-white text-hover-white opacity-75 hover-opacity-100">Latest Updated</a>
                        <!--end::Item-->
                    </div>
                    <!--end::Breadcrumb-->
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
            <div class="card mb-4">
                <div class="card-body">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <div class="row">
                            <div class="col-12 col-sm-4 col-md-3 col-lg-3 col-xl-3">
                                <a href="{{url('user-create')}}" class="btn btn-primary btn-lg btn-block m-3 font-weight-bolder"><i class="fa fa-user-plus"></i>&nbsp; Add Member</a>
                            </div>
                            <div class="col-12 col-sm-4 col-md-3 col-lg-3 col-xl-3">
                                <a href="{{url('payee-create')}}" class="btn btn-primary btn-lg btn-block m-3 font-weight-bolder"><i class="fa fa-user-plus"></i>&nbsp; Add Supplier</a>
                            </div>
                            <div class="col-12 col-sm-4 col-md-3 col-lg-3 col-xl-3">
                                <a href="{{url('payEmployee')}}" class="btn btn-primary btn-lg btn-block m-3 font-weight-bolder"><i class="fa fa-donate"></i>&nbsp; Money Transfer</a>
                            </div>
                            <div class="col-12 col-sm-4 col-md-3 col-lg-3 col-xl-3">
                                <a href="{{url('emi-create')}}" class="btn btn-primary btn-lg btn-block m-3 font-weight-bolder"><i class="fa fa-wallet"></i>&nbsp; Add EMI or OTP</a>
                            </div>
                            <div class="col-12 col-sm-4 col-md-3 col-lg-3 col-xl-3">
                                <a href="{{url('debit-material')}}" class="btn btn-primary btn-lg btn-block m-3 font-weight-bolder"><i class="fa fa-cube"></i>&nbsp;Used Materials</a>
                            </div>
                            <div class="col-12 col-sm-4 col-md-3 col-lg-3 col-xl-3">
                                <a href="{{url('credit-material')}}" class="btn btn-primary btn-lg btn-block m-3 font-weight-bolder"><i class="fa fa-cubes"></i>&nbsp; Add Material</a>
                            </div>
                            <div class="col-12 col-sm-4 col-md-3 col-lg-3 col-xl-3">
                                <a href="{{url('stock')}}" class="btn btn-primary btn-lg btn-block m-3 font-weight-bolder"><i class="fa fa-box"></i>&nbsp; Current Stock</a>
                            </div>
                            <div class="col-12 col-sm-4 col-md-3 col-lg-3 col-xl-3">
                                <a href="{{url('account')}}" class="btn btn-primary btn-lg btn-block m-3 font-weight-bolder"><i class="fa fa-university"></i>&nbsp; Transactions</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--begin::Dashboard-->

            <!--begin::Row-->
            <div class="row">
                <div class="col-lg-6 col-xxl-6">
                    <!--begin::Mixed Widget 4-->
                    <div class="card mb-4">
                        <div class="card-body d-flex flex-column py-0">

                            <!--begin::Stats-->
                            <div class="card-spacer bg-white card-rounded flex-grow-1">
                                <!--begin::Row-->
                                <div class="row m-0">
                                    <div class="col py-6">
                                        <div class="font-size-h5-xl text-primary font-weight-bold">Total</div>
                                        <div class="font-size-h4 font-weight-bolder">&#2547;&nbsp;{{$data[0]->total}}</div>
                                    </div>

                                    <div class="col py-6">
                                        <div class="font-size-h5-xl text-warning font-weight-bold">Due</div>
                                        <div class="font-size-h4 font-weight-bolder">&#2547;&nbsp;{{$data[0]->Due}}</div>
                                    </div>
                                    <div class="col py-6">
                                        <div class="font-size-h5-xl text-success font-weight-bold">Collection</div>
                                        <div class="font-size-h4 font-weight-bolder">&#2547;&nbsp;{{$data[0]->Collect}}</div>
                                    </div>
                                </div>

                                <!--end::Row-->
                            </div>
                            <!--end::Stats-->
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Mixed Widget 4-->
                </div>
                <div class="col-xl-6">
                    <div class="row">
                        <div class="col-xl-6">
                            <!--begin::Tiles Widget 11-->
                            <div class="card card-custom bg-primary gutter-b" style="height: 140px;">
                                <div class="card-body">
                                            <span class="svg-icon svg-icon-3x svg-icon-white ml-n2">
                                                <!--begin::Svg Icon | path:http://bcats.net/admin/assets/media/svg/icons/Layout/Layout-4-blocks.svg-->
                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <rect x="0" y="0" width="24" height="24"></rect>
                                                        <rect fill="#000000" x="4" y="4" width="7" height="7" rx="1.5"></rect>
                                                        <path d="M5.5,13 L9.5,13 C10.3284271,13 11,13.6715729 11,14.5 L11,18.5 C11,19.3284271 10.3284271,20 9.5,20 L5.5,20 C4.67157288,20 4,19.3284271 4,18.5 L4,14.5 C4,13.6715729 4.67157288,13 5.5,13 Z M14.5,4 L18.5,4 C19.3284271,4 20,4.67157288 20,5.5 L20,9.5 C20,10.3284271 19.3284271,11 18.5,11 L14.5,11 C13.6715729,11 13,10.3284271 13,9.5 L13,5.5 C13,4.67157288 13.6715729,4 14.5,4 Z M14.5,13 L18.5,13 C19.3284271,13 20,13.6715729 20,14.5 L20,18.5 C20,19.3284271 19.3284271,20 18.5,20 L14.5,20 C13.6715729,20 13,19.3284271 13,18.5 L13,14.5 C13,13.6715729 13.6715729,13 14.5,13 Z" fill="#000000" opacity="0.3"></path>
                                                    </g>
                                                </svg>
                                                <!--end::Svg Icon-->
                                            </span>
                                    <div class="text-inverse-primary font-weight-bolder font-size-h2 mt-3">{{$data[0]->supplier}}</div>
                                    <a href="#" class="text-inverse-primary font-weight-bold font-size-lg mt-1">Supplier</a>


                                </div>
                            </div>
                            <!--end::Tiles Widget 11-->
                        </div>
                        <div class="col-xl-6">
                            <!--begin::Tiles Widget 12-->
                            <div class="card card-custom gutter-b" style="height: 140px;">
                                <div class="card-body">
                                            <span class="svg-icon svg-icon-3x svg-icon-success">
                                                <!--begin::Svg Icon | path:http://bcats.net/admin/assets/media/svg/icons/Communication/Group.svg-->
                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <polygon points="0 0 24 0 24 24 0 24"></polygon>
                                                        <path d="M18,14 C16.3431458,14 15,12.6568542 15,11 C15,9.34314575 16.3431458,8 18,8 C19.6568542,8 21,9.34314575 21,11 C21,12.6568542 19.6568542,14 18,14 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
                                                        <path d="M17.6011961,15.0006174 C21.0077043,15.0378534 23.7891749,16.7601418 23.9984937,20.4 C24.0069246,20.5466056 23.9984937,21 23.4559499,21 L19.6,21 C19.6,18.7490654 18.8562935,16.6718327 17.6011961,15.0006174 Z M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z" fill="#000000" fill-rule="nonzero"></path>
                                                    </g>
                                                </svg>
                                                <!--end::Svg Icon-->
                                            </span>
                                    <div class="text-dark font-weight-bolder font-size-h2 mt-3">{{$data[0]->members}}</div>
                                    <a href="#" class="text-muted text-hover-primary font-weight-bold font-size-lg mt-1">Member</a>
                                </div>
                            </div>
                            <!--end::Tiles Widget 12-->
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 col-xxl-12">
                    <!--begin::Advance Table Widget 1-->
                    <div class="card card-custom card-stretch gutter-b">
                        <!--begin::Header-->
                        <div class="card-header border-0 py-5">
                            <h3 class="card-title align-items-start flex-column">
                                <span class="card-label font-weight-bolder text-dark">Users</span>
{{--                                <span class="text-muted mt-3 font-weight-bold font-size-sm">More than 400+ new members</span>--}}
                            </h3>
                            <div class="card-toolbar">
                                <a href="{{url('user-create')}}" class="btn btn-success font-weight-bolder font-size-sm">
                                    <span class="svg-icon svg-icon-md svg-icon-white">
                                        <!--begin::Svg Icon | path:{{asset('admin')}}/assets/media/svg/icons/Communication/Add-user.svg-->
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <polygon points="0 0 24 0 24 24 0 24" />
                                                <path d="M18,8 L16,8 C15.4477153,8 15,7.55228475 15,7 C15,6.44771525 15.4477153,6 16,6 L18,6 L18,4 C18,3.44771525 18.4477153,3 19,3 C19.5522847,3 20,3.44771525 20,4 L20,6 L22,6 C22.5522847,6 23,6.44771525 23,7 C23,7.55228475 22.5522847,8 22,8 L20,8 L20,10 C20,10.5522847 19.5522847,11 19,11 C18.4477153,11 18,10.5522847 18,10 L18,8 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                                <path d="M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z" fill="#000000" fill-rule="nonzero" />
                                            </g>
                                        </svg>
                                        <!--end::Svg Icon-->
                                    </span>Add New Member</a>
                            </div>
                        </div>
                        <!--end::Header-->
                        <!--begin::Body-->
                        <div class="card-body py-0">
                            <!--begin::Table-->
                            <div class="table-responsive">
                                <table class="table table-head-custom table-vertical-center" id="kt_advance_table_widget_1">
                                    <thead>
                                        <tr class="text-left">
                                            <th class="pr-0" style="width: 50px">#</th>
                                            <th style="min-width: 200px">Name</th>
                                            <th style="min-width: 150px">Phone</th>
                                            <th style="min-width: 150px">Email</th>
                                            <th class="pr-0 text-right" style="min-width: 150px">action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    @foreach($users as $user)
                                        <tr>
                                            <td>
                                                {{$loop->iteration}}
                                            </td>
                                            <td class="pl-0">
                                                <a href="#" class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">{{$user->name}}</a>
                                                <span class="text-muted font-weight-bold text-muted d-block">{{base64_decode($user->acl)}}</span>
                                            </td>
                                            <td>
                                                <span class="text-dark-75 font-weight-bolder d-block font-size-lg">{{$user->mobile}}</span>
{{--                                                <span class="text-muted font-weight-bold">Email</span>--}}
                                            </td>
                                            <td>
                                                <span class="text-dark-75 font-weight-bolder d-block font-size-lg">{{$user->email}}</span>
                                            </td>
                                            <td class="pr-0 text-right">
{{--                                                <a href="#" class="btn btn-icon btn-light btn-hover-primary btn-sm">--}}
{{--                                                    <span class="svg-icon svg-icon-md svg-icon-primary">--}}
{{--                                                        <!--begin::Svg Icon | path:{{asset('admin')}}/assets/media/svg/icons/General/Settings-1.svg-->--}}
{{--                                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">--}}
{{--                                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">--}}
{{--                                                                <rect x="0" y="0" width="24" height="24" />--}}
{{--                                                                <path d="M7,3 L17,3 C19.209139,3 21,4.790861 21,7 C21,9.209139 19.209139,11 17,11 L7,11 C4.790861,11 3,9.209139 3,7 C3,4.790861 4.790861,3 7,3 Z M7,9 C8.1045695,9 9,8.1045695 9,7 C9,5.8954305 8.1045695,5 7,5 C5.8954305,5 5,5.8954305 5,7 C5,8.1045695 5.8954305,9 7,9 Z" fill="#000000" />--}}
{{--                                                                <path d="M7,13 L17,13 C19.209139,13 21,14.790861 21,17 C21,19.209139 19.209139,21 17,21 L7,21 C4.790861,21 3,19.209139 3,17 C3,14.790861 4.790861,13 7,13 Z M17,19 C18.1045695,19 19,18.1045695 19,17 C19,15.8954305 18.1045695,15 17,15 C15.8954305,15 15,15.8954305 15,17 C15,18.1045695 15.8954305,19 17,19 Z" fill="#000000" opacity="0.3" />--}}
{{--                                                            </g>--}}
{{--                                                        </svg>--}}
{{--                                                        <!--end::Svg Icon-->--}}
{{--                                                    </span>--}}
{{--                                                </a>--}}
                                                <a href="{{url('user-edit/'.$user->id)}}" class="btn btn-icon btn-light btn-hover-primary btn-sm mx-3">
                                                    <span class="svg-icon svg-icon-md svg-icon-primary">
                                                        <!--begin::Svg Icon | path:{{asset('admin')}}/assets/media/svg/icons/Communication/Write.svg-->
                                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                <rect x="0" y="0" width="24" height="24" />
                                                                <path d="M12.2674799,18.2323597 L12.0084872,5.45852451 C12.0004303,5.06114792 12.1504154,4.6768183 12.4255037,4.38993949 L15.0030167,1.70195304 L17.5910752,4.40093695 C17.8599071,4.6812911 18.0095067,5.05499603 18.0083938,5.44341307 L17.9718262,18.2062508 C17.9694575,19.0329966 17.2985816,19.701953 16.4718324,19.701953 L13.7671717,19.701953 C12.9505952,19.701953 12.2840328,19.0487684 12.2674799,18.2323597 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.701953, 10.701953) rotate(-135.000000) translate(-14.701953, -10.701953)" />
                                                                <path d="M12.9,2 C13.4522847,2 13.9,2.44771525 13.9,3 C13.9,3.55228475 13.4522847,4 12.9,4 L6,4 C4.8954305,4 4,4.8954305 4,6 L4,18 C4,19.1045695 4.8954305,20 6,20 L18,20 C19.1045695,20 20,19.1045695 20,18 L20,13 C20,12.4477153 20.4477153,12 21,12 C21.5522847,12 22,12.4477153 22,13 L22,18 C22,20.209139 20.209139,22 18,22 L6,22 C3.790861,22 2,20.209139 2,18 L2,6 C2,3.790861 3.790861,2 6,2 L12.9,2 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                                            </g>
                                                        </svg>
                                                        <!--end::Svg Icon-->
                                                    </span>
                                                </a>

{{--                                                <button type="submit" class="btn btn-icon btn-light btn-hover-primary btn-sm">--}}
{{--                                                    <span class="svg-icon svg-icon-md svg-icon-primary">--}}
{{--                                                        <!--begin::Svg Icon | path:{{asset('admin')}}/assets/media/svg/icons/General/Trash.svg-->--}}
{{--                                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">--}}
{{--                                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">--}}
{{--                                                                <rect x="0" y="0" width="24" height="24" />--}}
{{--                                                                <path d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z" fill="#000000" fill-rule="nonzero" />--}}
{{--                                                                <path d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z" fill="#000000" opacity="0.3" />--}}
{{--                                                            </g>--}}
{{--                                                        </svg>--}}
{{--                                                        <!--end::Svg Icon-->--}}
{{--                                                    </span>--}}
{{--                                                </button>--}}

                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!--end::Table-->
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Advance Table Widget 1-->
                </div>
            </div>
            <!--end::Row-->


        <!--end::Container-->
    </div>
    <!--end::Entry-->
</div>
@endsection
