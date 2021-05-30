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
                    <h2 class="text-white font-weight-bold my-2 mr-5">Project</h2>
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
            <!--begin::Row-->
            <div class="row">
                <div class="col-lg-12">
                    <!--begin::Advance Table Widget 2-->
                    <div class="card card-custom card-stretch gutter-b">
                        <!--begin::Header-->
                        <div class="card-header border-0 pt-5">
                            <h3 class="card-title align-items-start flex-column">
                                <span class="card-label font-weight-bolder text-dark">Search Payee</span>
                                <!-- <span class="text-muted mt-3 font-weight-bold font-size-sm">More than 400+ new members</span> -->
                            </h3>
                            <div class="card-toolbar">

                            </div>
                        </div>
                        <!--end::Header-->
                        <!--begin::Body-->
                        <div class="card-body pt-3 pb-0">

                            <div class="card-body">
                                <div class="row">

                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="message">search keyword:</label>
                                            <input type="text" v-on:keyup="search_keyword" v-model="searchKeyword" name="searchKeyword" id="message" class="form-control form-control-solid" placeholder="Enter Message">

                                        </div>
                                        <ul class="list-group" style="position: absolute; width:100% !important;z-index:2;">

                                    <li style="cursor: pointer;" class="list-group-item list-hover"
                                        v-for="(result, index) in results">
                                        <a href="{{ url(supplier/@ {{ result.id }})  }}">@{{ result.name }}</a></li>
                                </ul>
                                    </div>
                                </div>
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
        $(document).ready(function() {
            let vue = new Vue({
                el: '#vue_app',
                data: {
                    config: {
                        get_search_url: "{{ url('supplierSearch') }}",

                    },
                    searchKeyword: '',
                    project_id: '{{ $projectId }}',
                    results: []

                },
                methods: {
                    search_keyword() {
                        let vm = this;
                        let slug = vm.searchKeyword;
                        let project_id = vm.project_id;
                        if (slug) {
                            axios.post('api/supplierSearch', {
                                query: slug,
                                project_id:project_id
                            }).then(function(response) {
                                vm.results = response.data.result;
                                console.log(vm.results);
                            }).catch(function(error) {
                                toastr.error('Something went to wrong', {
                                    closeButton: true,
                                    progressBar: true,
                                });
                                return false;
                            });
                        }
                    }
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