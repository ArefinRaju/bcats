@extends('admin.layouts.master')
@section('title')
    Supplier
@endsection
@section('js')

@endsection
@section('css')
    <link href="{{ asset('admin/assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet"
          type="text/css"/>
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
                        <h2 class="text-white font-weight-bold my-2 mr-5">Payee List</h2>
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
                            <h3 class="card-label">Supplier,Employee & Contractor</h3>
                        </div>
                        <div class="card-toolbar">
                            <!--begin::Dropdown-->
                            <div class="dropdown dropdown-inline mr-2">
                                <button type="button" class="btn btn-light-primary font-weight-bolder dropdown-toggle"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="la la-download"></i>Filter
                                </button>
                                <!--begin::Dropdown Menu-->
                                <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                                    <ul class="nav flex-column nav-hover">
                                        <li class="nav-header font-weight-bolder text-uppercase text-primary pb-2 text-center">
                                            Choose an
                                            option:
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{url('supplierList/SUPPLIER')}}" class="nav-link">
                                                <i class="nav-icon la la-print"></i>
                                                <span class="nav-text">SUPPLIER</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{url('supplierList/EMPLOYEE')}}" class="nav-link">
                                                <i class="nav-icon la la-print"></i>
                                                <span class="nav-text">EMPLOYEE</span>
                                            </a>
                                        </li> <li class="nav-item">
                                            <a href="{{url('supplierList/CONTRACTOR')}}" class="nav-link">
                                                <i class="nav-icon la la-print"></i>
                                                <span class="nav-text">CONTRACTOR</span>
                                            </a>
                                        </li>

                                    </ul>
                                </div>
                                <!--end::Dropdown Menu-->
                            </div>
                            <!--end::Dropdown-->
                            <!--begin::Button-->
                            <a href="{{ url('/payee-create') }}" class="btn btn-primary font-weight-bolder">
                                <i class="la la-plus"></i>New Supplier</a>
                            <!--end::Button-->
                        </div>
                    </div>
                    <div class="card-body">
                        <!--begin: Datatable-->
                        <table class="table table-bordered table-hover table-checkable" id="kt_datatable"
                               style="margin-top: 13px !important">
                            <thead class="text-center">
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Mobile</th>
                                <th>Total</th>
                                <th>Paid</th>
                                <th>Due</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody class="text-center">


                            @foreach ($data as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->mobile }}</td>
                                    <td>{{( $item->paid + $item->due == 0) ? 0 : $item->paid + $item->due}}</td>
                                    <td>{{ ($item->paid == 0) ? 0 : $item->paid }}</td>
                                    <td>{{ ($item->due == 0) ? 0 : $item->due }}</td>
                                    <td>
                                    <div class="text-center">

                                        <form action="{{url('payee', $item->id)}}" method="post">
                                            <input type="hidden" name="_method" value="DELETE">
                                            @csrf
                                            <a href="{{ url('payee-edit', $item->id) }}" class="btn  btn-sm btn-primary">
                                                <i class="fa fa-pencil-square-o"></i>
                                                Edit
                                            </a>
                                            <a href="{{ url('transaction', $item->id) }}" class="btn btn-sm  btn-primary">
                                                <i class="fa fa-pencil-square-o"></i>
                                                Transaction
                                            </a>
                                            <a href="{{ url('invoice', $item->id) }}" class="btn btn-sm btn-primary">
                                                <i class="fa fa-pencil-square-o"></i>
                                                Invoice
                                            </a>
                                            <button id="btnDelete" class="btn  btn-sm btn-danger">Delete</button>
                                        </form>
                                    </div>
                                    </td>
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
    <script src="{{ asset('admin') }}/assets/plugins/custom/datatables/datatables.bundle.js?v=7.0.4"></script>
    <!--end::Page Vendors-->
    <!--begin::Page Scripts(used by this page)-->
    <script src="{{ asset('admin') }}/assets/js/pages/crud/datatables/data-sources/html.js?v=7.0.4"></script>
    <!--end::Page Scripts-->
@endsection
