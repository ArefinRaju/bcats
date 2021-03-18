@extends('admin.layouts.master')
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
                    <h2 class="text-white font-weight-bold my-2 mr-5">Default Forms</h2>
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
                        <a href="" class="text-white text-hover-white opacity-75 hover-opacity-100">Crud</a>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <span class="label label-dot label-sm bg-white opacity-75 mx-3"></span>
                        <a href="" class="text-white text-hover-white opacity-75 hover-opacity-100">Forms &amp; Controls</a>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <span class="label label-dot label-sm bg-white opacity-75 mx-3"></span>
                        <a href="" class="text-white text-hover-white opacity-75 hover-opacity-100">Form Layouts</a>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <span class="label label-dot label-sm bg-white opacity-75 mx-3"></span>
                        <a href="" class="text-white text-hover-white opacity-75 hover-opacity-100">Default Forms</a>
                        <!--end::Item-->
                    </div>
                    <!--end::Breadcrumb-->
                </div>
                <!--end::Heading-->
            </div>
            <!--end::Info-->
            <!--begin::Toolbar-->
            <div class="d-flex align-items-center">
                <!--begin::Button-->
                <a href="#" class="btn btn-transparent-white font-weight-bold py-3 px-6 mr-2">Reports</a>
                <!--end::Button-->
                <!--begin::Dropdown-->
                <div class="dropdown dropdown-inline ml-2" data-toggle="tooltip" title="Quick actions" data-placement="top">
                    <a href="#" class="btn btn-white font-weight-bold py-3 px-6" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Actions</a>
                    <div class="dropdown-menu p-0 m-0 dropdown-menu-md dropdown-menu-right">
                        <!--begin::Navigation-->
                        <ul class="navi navi-hover py-5">
                            <li class="navi-item">
                                <a href="#" class="navi-link">
                                    <span class="navi-icon">
                                        <i class="flaticon2-drop"></i>
                                    </span>
                                    <span class="navi-text">New Group</span>
                                </a>
                            </li>
                            <li class="navi-item">
                                <a href="#" class="navi-link">
                                    <span class="navi-icon">
                                        <i class="flaticon2-list-3"></i>
                                    </span>
                                    <span class="navi-text">Contacts</span>
                                </a>
                            </li>
                            <li class="navi-item">
                                <a href="#" class="navi-link">
                                    <span class="navi-icon">
                                        <i class="flaticon2-rocket-1"></i>
                                    </span>
                                    <span class="navi-text">Groups</span>
                                    <span class="navi-link-badge">
                                        <span class="label label-light-primary label-inline font-weight-bold">new</span>
                                    </span>
                                </a>
                            </li>
                            <li class="navi-item">
                                <a href="#" class="navi-link">
                                    <span class="navi-icon">
                                        <i class="flaticon2-bell-2"></i>
                                    </span>
                                    <span class="navi-text">Calls</span>
                                </a>
                            </li>
                            <li class="navi-item">
                                <a href="#" class="navi-link">
                                    <span class="navi-icon">
                                        <i class="flaticon2-gear"></i>
                                    </span>
                                    <span class="navi-text">Settings</span>
                                </a>
                            </li>
                            <li class="navi-separator my-3"></li>
                            <li class="navi-item">
                                <a href="#" class="navi-link">
                                    <span class="navi-icon">
                                        <i class="flaticon2-magnifier-tool"></i>
                                    </span>
                                    <span class="navi-text">Help</span>
                                </a>
                            </li>
                            <li class="navi-item">
                                <a href="#" class="navi-link">
                                    <span class="navi-icon">
                                        <i class="flaticon2-bell-2"></i>
                                    </span>
                                    <span class="navi-text">Privacy</span>
                                    <span class="navi-link-badge">
                                        <span class="label label-light-danger label-rounded font-weight-bold">5</span>
                                    </span>
                                </a>
                            </li>
                        </ul>
                        <!--end::Navigation-->
                    </div>
                </div>
                <!--end::Dropdown-->
            </div>
            <!--end::Toolbar-->
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
                            <h3 class="card-title">Basic Form Layout</h3>
                            <div class="card-toolbar">
                                <div class="example-tools justify-content-center">
                                    <span class="example-toggle" data-toggle="tooltip" title="View code"></span>
                                    <span class="example-copy" data-toggle="tooltip" title="Copy code"></span>
                                </div>
                            </div>
                        </div>
                        <!--begin::Form-->
                        <form class="form">
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Full Name:</label>
                                    <input type="email" class="form-control form-control-solid" placeholder="Enter full name" />
                                    <span class="form-text text-muted">Please enter your full name</span>
                                </div>
                                <div class="form-group">
                                    <label>Email address:</label>
                                    <input type="email" class="form-control form-control-solid" placeholder="Enter email" />
                                    <span class="form-text text-muted">We'll never share your email with anyone else</span>
                                </div>
                                <div class="form-group">
                                    <label>Subscription</label>
                                    <div class="input-group input-group-solid">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">$</span>
                                        </div>
                                        <input type="text" class="form-control form-control-solid" placeholder="99.9" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Communication:</label>
                                    <div class="checkbox-list">
                                        <label class="checkbox">
                                            <input type="checkbox" />Email
                                            <span></span></label>
                                        <label class="checkbox">
                                            <input type="checkbox" />SMS
                                            <span></span></label>
                                        <label class="checkbox">
                                            <input type="checkbox" />Phone
                                            <span></span></label>
                                    </div>
                                </div>
                                <!--begin: Code-->
                                <div class="example-code mt-10">
                                    <ul class="example-nav nav nav-tabs nav-bold nav-tabs-line nav-tabs-line-2x">
                                        <li class="nav-item">
                                            <a class="nav-link active" data-toggle="tab" href="#example_code_html">HTML</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="example_code_html" role="tabpanel">
                                            <div class="example-highlight">
                                                <pre style="height:400px">
                                                                <code class="language-html">
                                                                        &lt;form class="form"&gt;
                                                                        &lt;div class="card-body"&gt;
                                                                        &lt;div class="form-group"&gt;
                                                                        &lt;label&gt;Full Name:&lt;/label&gt;
                                                                        &lt;input type="email" class="form-control form-control-solid" placeholder="Enter full name"/&gt;
                                                                        &lt;span class="form-text text-muted"&gt;Please enter your full name&lt;/span&gt;
                                                                        &lt;/div&gt;
                                                                        &lt;div class="form-group"&gt;
                                                                        &lt;label&gt;Email address:&lt;/label&gt;
                                                                        &lt;input type="email" class="form-control form-control-solid" placeholder="Enter email"/&gt;
                                                                        &lt;span class="form-text text-muted"&gt;We'll never share your email with anyone else&lt;/span&gt;
                                                                        &lt;/div&gt;
                                                                        &lt;div class="form-group"&gt;
                                                                        &lt;label&gt;Subscription&lt;/label&gt;
                                                                        &lt;div class="input-group input-group-lg"&gt;
                                                                            &lt;div class="input-group-prepend"&gt;&lt;span class="input-group-text" &gt;$&lt;/span&gt;&lt;/div&gt;
                                                                            &lt;input type="text" class="form-control form-control-solid" placeholder="99.9"/&gt;
                                                                        &lt;/div&gt;
                                                                        &lt;/div&gt;
                                                                        &lt;div class="form-group"&gt;
                                                                        &lt;label&gt;Communication:&lt;/label&gt;
                                                                        &lt;div class="checkbox-list"&gt;
                                                                            &lt;label class="checkbox"&gt;
                                                                            &lt;input type="checkbox"/&gt; Email
                                                                            &lt;span&gt;&lt;/span&gt;
                                                                            &lt;/label&gt;
                                                                            &lt;label class="checkbox"&gt;
                                                                            &lt;input type="checkbox"/&gt; SMS
                                                                            &lt;span&gt;&lt;/span&gt;
                                                                            &lt;/label&gt;
                                                                            &lt;label class="checkbox"&gt;
                                                                            &lt;input type="checkbox"/&gt; Phone
                                                                            &lt;span&gt;&lt;/span&gt;
                                                                            &lt;/label&gt;
                                                                        &lt;/div&gt;
                                                                        &lt;/div&gt;
                                                                        &lt;/div&gt;
                                                                        &lt;div class="card-footer"&gt;
                                                                        &lt;button type="reset" class="btn btn-primary mr-2"&gt;Submit&lt;/button&gt;
                                                                        &lt;button type="reset" class="btn btn-secondary"&gt;Cancel&lt;/button&gt;
                                                                        &lt;/div&gt;
                                                                        &lt;/form&gt;
                                                                        </code>
                                                                </pre>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--end: Code-->
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