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
                        <h3 class="card-label">
                            Supplier,Employee & Contractor List</h3>
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
                        <!--begin::Dropdown-->
                        <div class="dropdown dropdown-inline mr-2">
                            <button type="button" class="btn btn-light-primary font-weight-bolder dropdown-toggle"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="la la-download"></i>Select Payee Type
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
                            <i class="la la-plus"></i>New Payee</a>
                        <!--end::Button-->
                    </div>
                </div>
                <div class="card-body">
                    <!--begin: Datatable-->
                    <table class="table table-bordered table-hover table-checkable" id="kt_datatable" style="margin-top: 13px !important">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Mobile</th>
                                <th>Address</th>
                                <th>Type</th>
                                <th>Paid</th>
                                <th>Due</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $payee)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$payee->name??''}}</td>
                                <td>{{$payee->mobile??''}}</td>
                                <td>{{$payee->address??''}}</td>
                                <td>{{$payee->type??''}}</td>
                                <td>{{$payee->paid??''}}</td>
                                <td>{{$payee->due??''}}</td>
                                <td nowrap="nowrap">
                                    <div class="d-flex justify-content-around">

                                        <form action="{{url('payee', $payee->id)}}" method="post">
                                            <a href="{{url('supplier/'.$payee->id)}}" class="btn btn-sm btn-primary">View</a>
                                            <input type="hidden" name="_method" value="DELETE">
                                            @csrf
                                            <a href="{{ url('payee-edit', $payee->id) }}" class="btn btn-sm btn-primary">
                                                <i class="fa fa-pencil-square-o"></i>
                                                Edit
                                            </a>
                                            <a href="{{ url('transaction', $payee->id) }}" class="btn btn-sm btn-primary">
                                                <i class="fa fa-pencil-square-o"></i>
                                                Transaction
                                            </a>
                                            <a href="{{ url('invoice', $payee->id) }}" class="btn btn-sm btn-primary">
                                                <i class="fa fa-pencil-square-o"></i>
                                                Invoice
                                            </a>
                                            <button id="btnDelete" class="btn btn-sm btn-danger">Delete</button>
                                        </form>


                                    </div>
                                </td>
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
