@extends('admin.layouts.master')
@section('title')
Dashboard
@endsection
@section('content')
<!--begin::Content-->
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Subheader-->
    <div class="subheader py-2 py-lg-4 subheader-transparent" id="kt_subheader">
        <div class="container d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex align-items-center flex-wrap mr-1">
                <!--begin::Heading-->
                <div class="d-flex flex-column">
                    <!--begin::Title-->
                    <h2 class="text-white font-weight-bold my-2 mr-5">Employee Balance Transfer</h2>
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
            <!--begin::Card-->
            <div class="card card-custom">
                <div class="card-header">
                    <div class="card-title">
                        <span class="card-icon">
                            <i class="flaticon2-favourite text-primary"></i>
                        </span>
                        <h3 class="card-label">Employee Balance Transfer</h3>
                    </div>
                    <div class="card-toolbar">
                        <!--begin::Dropdown-->
                        <div class="dropdown dropdown-inline mr-2">
                            <button type="button" class="btn btn-light-primary font-weight-bolder dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="la la-download"></i>Export</button>
                            <!--begin::Dropdown Menu-->
                            <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                                <ul class="nav flex-column nav-hover">
                                    <li class="nav-header font-weight-bolder text-uppercase text-primary pb-2">Choose an option:</li>
                                    <li class="nav-item">
                                        <a href="#" class="nav-link">
                                            <i class="nav-icon la la-print"></i>
                                            <span class="nav-text">Print</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#" class="nav-link">
                                            <i class="nav-icon la la-copy"></i>
                                            <span class="nav-text">Copy</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#" class="nav-link">
                                            <i class="nav-icon la la-file-excel-o"></i>
                                            <span class="nav-text">Excel</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#" class="nav-link">
                                            <i class="nav-icon la la-file-text-o"></i>
                                            <span class="nav-text">CSV</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#" class="nav-link">
                                            <i class="nav-icon la la-file-pdf-o"></i>
                                            <span class="nav-text">PDF</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <!--end::Dropdown Menu-->
                        </div>
                        <!--end::Dropdown-->
                        <!--begin::Button-->
                        <a href="{{ url('/payEmployee') }}" class="btn btn-primary font-weight-bolder"><i class="la la-plus"></i>New Transfer</a>
                        {{--                        <a href="{{ url('/payment/create') }}" class="btn btn-primary font-weight-bolder">--}}
{{--                            <i class="la la-plus"></i>New Record</a>--}}
                        <!--end::Button-->
                    </div>
                </div>
                <div class="card-body">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 p-0 mb-2">
                        <div class="row">
{{--                            <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 p-0">--}}
{{--                                <div class="card">--}}
{{--                                    <div class="card-header p-2">--}}
{{--                                        <h3 class="font-weight-bolder text-center p-2">Main Account</h3>--}}
{{--                                    </div>--}}
{{--                                    <div class="card-body">--}}
{{--                                        @foreach ($data as $item)--}}
{{--                                            @if ($loop->first)--}}
{{--                                            <h4 class="font-weight-bold text-primary text-center p-2">{{$item->total}}</h4>--}}
{{--                                            @endif--}}
{{--                                        @endforeach--}}

{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <div class="card">
                                    <div class="card-header p-2">
                                        <h3 class="font-weight-bolder text-center p-2">Employee Account</h3>
                                    </div>
                                    <div class="card-body">
                                        @foreach ($data as $item)
                                            @if ($loop->first)
                                            <h4 class="font-weight-bold text-warning text-center p-2">{{$item->employee}}</h4>
                                            @endif
                                        @endforeach

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!--begin: Datatable-->
                    <table class="table table-bordered table-hover table-checkable text-center">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Admin Exist Balance</th>
                                <th>Payment Due</th>
                                <th>Employe Exist Balance</th>
                                <th>Transfer  Type</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($data as $item)
                            <tr>
                                <td>{{$item->account_id}}</td>
                                <td>{{$item->name}}</td>
                                <td>{{$item->total}}</td>
                                <td>{{$item->due}}</td>
                                <td>{{$item->employee}}</td>
                                <td>{{$item->debit}}</td>

                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <!--end: Datatable-->
                </div>
            </div>
            <!--end::Card-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Entry-->
</div>
<!--end::Content-->
@endsection
@section('js')
<!--begin::Page Vendors(used by this page)-->
<script src="{{asset('admin/assets/plugins/custom/datatables/datatables.bundle.js')}}"></script>
<!--end::Page Vendors-->
<!--begin::Page Scripts(used by this page)-->
<script src="{{asset('admin/assets/js/pages/crud/datatables/data-sources/html.js')}}"></script>
<!--end::Page Scripts-->
@endsection
