@extends('admin.layouts.master')
@section('title')
Dashboard
@endsection
@section('css')

@endsection
@section('js')
<script src="{{ asset('vue-js/axios/dist/axios.min.js') }}"></script>

<script>

$('#collectorId').change(function(){
const id=$('#collectorId').val();
                axios.post('/user-details-ajax',{
                    id:id
                }).then(res=>{
                    const onHold=res.data.on_hold
                    const absoluteValue=Math.abs(onHold);
                    console.log(Math.sign(absoluteValue));

                    if(Math.sign(absoluteValue) == true){
                        $('#amount').val(absoluteValue);
                    }else{
                        $('#amount').val(0);

                    }

                }).catch(err => {
                console.log(err)
            })
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
                    <h2 class="text-white font-weight-bold my-2 mr-5">Credit</h2>
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
                            <h3 class="card-title">Credit</h3>
                            <div class="card-toolbar">
                                <!--begin::Button-->
                                <a href="{{ url('/credit/list') }}" class="btn btn-primary font-weight-bolder">
                                    <i class="la la-list"></i>See Record</a>
                                <!--end::Button-->
                            </div>
                        </div>
                        <!--begin::Form-->
                        <form class="form" method="POST" action="{{ url('/credit') }}">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label>By Collector</label>
                                            <select class="form-control form-control-solid" name="fundCollector" id="collectorId">
                                                <option value="0">Select Collector</option>
                                                @foreach($users as $usersItem)
                                                <option value="{{$usersItem->id}}">{{ $usersItem->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label>Amount:</label>
                                            <input type="text" name="amount" id="amount" class="form-control form-control-solid" placeholder="Enter Amount" />

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

