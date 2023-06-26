@extends('layouts.master')
@section('css')
    <!--- Internal Select2 css-->
    <link href="{{ URL::asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
    <!---Internal Fileupload css-->
    <link href="{{ URL::asset('assets/plugins/fileuploads/css/fileupload.css') }}" rel="stylesheet" type="text/css" />
    <!---Internal Fancy uploader css-->
    <link href="{{ URL::asset('assets/plugins/fancyuploder/fancy_fileupload.css') }}" rel="stylesheet" />
    <!--Internal Sumoselect css-->
    <link rel="stylesheet" href="{{ URL::asset('assets/plugins/sumoselect/sumoselect-rtl.css') }}">
    <!--Internal  TelephoneInput css-->
    <link rel="stylesheet" href="{{ URL::asset('assets/plugins/telephoneinput/telephoneinput-rtl.css') }}">
@endsection
@section('title')
Add invoices
@stop

@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">invoices</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                    Add invoices</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')

    @if (session()->has('Add'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session()->get('Add') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <!-- row -->
    <div class="row">

        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('invoices.store') }}" method="post" enctype="multipart/form-data"
                        autocomplete="off">
                        {{ csrf_field() }}
                        {{-- 1 --}}

                        <div class="row">
                            <div class="col">
                                <label for="inputName" class="control-label">invoice number</label>
                                <input type="text" class="form-control" id="inputName" name="invoice_number"
                                    title="invoice number" required>
                            </div>

                            <div class="col">
                                <label> invoice Date</label>
                                <input class="form-control fc-datepicker" name="invoice_Date" placeholder="DD-MM-YYYY"
                                    type="text" value="{{ date('d-m-y') }}" required>
                            </div>

                            <div class="col">
                                <label>due date </label>
                                <input class="form-control fc-datepicker" name="Due_date" placeholder="DD-MM-YYYY"
                                    type="text" required>
                            </div>

                        </div>

                        {{-- 2 --}}
                        {{-- Counter Reference --}}
                        <div class="row">
<div class="col">
    <label for="inputName" class="control-label">Counter Reference</label>
    <select name="Reference" class="form-control SlectBox" onclick="console.log($(this).val())"
        onchange="console.log('change is firing')">
        <!--placeholder-->
        <option value="" selected disabled>Counter Reference</option>
        @foreach ($counters as $counter)
            <option value="{{ $counter->CounterReferenceid }}">{{ $counter->CounterReference }}</option>
        @endforeach
    </select>
</div>

{{-- Counter Type --}}
<div class="col">
    <label for="inputName" class="control-label">Counter Type</label>
    <select name="CounterTypeCode" class="form-control SlectBox" onclick="console.log($(this).val())"
        onchange="console.log('change is firing')">
        <!--placeholder-->
        <option value="" selected disabled>Counter Type</option>
        @foreach ($counters as $counter)
            <option value="{{ $counter->CounterTypeCode }}">{{ $counter->counterType->CounterType }}</option>
        @endforeach
    </select>
</div>

{{-- Local Label --}}
<div class="col">
    <label for="inputName" class="control-label">Local Label</label>
    <select name="LocalLabel" class="form-control SlectBox" onclick="console.log($(this).val())"
        onchange="console.log('change is firing')">
        <!--placeholder-->
        <option value="" selected disabled>Local Label</option>
        @foreach ($counters as $counter)
            <option value="{{ $counter->LocalCode }}">{{ $counter->locations->LocalLabel }}</option>
        @endforeach
    </select>
</div>
</div>
                        {{-- 3 --}}

                        <div class="row">

                     

                            <div class="col">
                                <label for="inputName" class="control-label">discount</label>
                                <input type="text" class="form-control form-control-lg" id="Discount" name="Discount"
                                    title="discount"
                                    oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"
                                    value=0 required>
                            </div>

                            <div class="col">
                                <label for="inputName" class="control-label">TVA</label>
                                <select name="Rate_VAT" id="Rate_VAT" class="form-control" onchange="myFunction()">
                                    <!--placeholder-->
                                    <option value="" selected disabled>%</option>
                                    <option value=" 5%">5%</option>
                                    <option value=" 7%">7%</option>
                                    <option value="10%">10%</option>
                                </select>
                            </div>

                        </div>

                        {{-- 4 --}}

                      

                            <div class="col">
                                <label for="inputName" class="control-label">Total</label>
                                <input type="text" class="form-control" id="Total" name="Total" readonly>
                            </div>
                        </div>

                        {{-- 5 --}}
                        <div class="row">
                            <div class="col">
                                <label for="exampleTextarea">note</label>
                                <textarea class="form-control" id="exampleTextarea" name="note" rows="3"></textarea>
                            </div>
                        </div><br>

                        <p class="text-danger">* pdf, jpeg ,.jpg , png </p>
                        <h5 class="card-title">Extension</h5>

                        <div class="col-sm-12 col-md-12">
                            <input type="file" name="pic" class="dropify" accept=".pdf,.jpg, .png, image/jpeg, image/png"
                                data-height="70" />
                        </div><br>

                        <div class="d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary">Add</button>
                        </div>


                    </form>
                </div>
            </div>
        </div>
    </div>

    </div>

    <!-- row closed -->
    </div>
    <!-- Container closed -->
    </div>
    <!-- main-content closed -->
@endsection
@section('js')
    <!-- Internal Select2 js-->
    <script src="{{ URL::asset('assets/plugins/select2/js/select2.min.js') }}"></script>
    <!--Internal Fileuploads js-->
    <script src="{{ URL::asset('assets/plugins/fileuploads/js/fileupload.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fileuploads/js/file-upload.js') }}"></script>
    <!--Internal Fancy uploader js-->
    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.ui.widget.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.fileupload.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.iframe-transport.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.fancy-fileupload.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fancyuploder/fancy-uploader.js') }}"></script>
    <!--Internal  Form-elements js-->
    <script src="{{ URL::asset('assets/js/advanced-form-elements.js') }}"></script>
    <script src="{{ URL::asset('assets/js/select2.js') }}"></script>
    <!--Internal Sumoselect js-->
    <script src="{{ URL::asset('assets/plugins/sumoselect/jquery.sumoselect.js') }}"></script>
    <!--Internal  Datepicker js -->
    <script src="{{ URL::asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js') }}"></script>
    <!--Internal  jquery.maskedinput js -->
    <script src="{{ URL::asset('assets/plugins/jquery.maskedinput/jquery.maskedinput.js') }}"></script>
    <!--Internal  spectrum-colorpicker js -->
    <script src="{{ URL::asset('assets/plugins/spectrum-colorpicker/spectrum.js') }}"></script>
    <!-- Internal form-elements js -->
    <script src="{{ URL::asset('assets/js/form-elements.js') }}"></script>

    <script>
        var date = $('.fc-datepicker').datepicker({
            dateFormat: 'dd-mm-yy'
        }).val();

    </script>



@endsection
