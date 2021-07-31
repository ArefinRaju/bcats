@extends('admin.layouts.master')
@section('title')
Dedit
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
                    <h2 class="text-white font-weight-bold my-2 mr-5">Debit</h2>
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
            <div class="row">
                <div class="col-lg-12">
                    <!--begin::Card-->
                    <div class="card card-custom gutter-b example example-compact">
                        <div class="card-header">
                            <h3 class="card-title">Debit</h3>
                            <div class="card-toolbar">
                                <!--begin::Button-->
                                <a href="{{ url('/material-debit-list') }}" class="btn btn-primary font-weight-bolder">
                                    <i class="la la-list"></i>See Record</a>
                                <!--end::Button-->
                            </div>
                        </div>
                        <!--begin::Form-->
                        <form class="form" method="POST" action="{{ url('/materialHistoryDebit') }}">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="category_id">Category Name:</label>
                                            <select class="form-control form-control-solid bSelect" @change="fetch_sub_category_and_product()" v-model="category_id" name="category_id" id="category_id">
                                                <option value="">Select one</option>
                                                @foreach($categories as $category)
                                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="materialId">Material:</label>
                                            <select class="form-control form-control-solid bSelect" name="materialId" id="materialId">
                                                <option value="">Select one</option>
                                                <option :value="row.id" v-for="row in sub_categories" v-html="row.name">
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label>Quantity:</label>
                                            <input type="number" name="quantity" class="form-control form-control-solid" placeholder="Enter Quantity" />

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

@section('js')
    <script src="{{ asset('vue-js/vue/dist/vue.js') }}"></script>
    <script src="{{ asset('vue-js/axios/dist/axios.min.js') }}"></script>
{{--    <script src="{{ asset('vue-js/bootstrap-select/dist/js/bootstrap-select.min.js') }}"></script>--}}
    <script>
        $(document).ready(function () {
            const vue = new Vue({
                el: '#vue_app',
                data: {
                    config: {
                        get_category_wise_sub_category_product_url: "{{ url('fetch-sub-category-product-info') }}",

                    },
                    category_id: '',
                    sub_categories: [],
                },
                methods: {

                    fetch_sub_category_and_product() {
                        const vm = this;
                        const slug = vm.category_id;
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


        });
    </script>
@endsection

