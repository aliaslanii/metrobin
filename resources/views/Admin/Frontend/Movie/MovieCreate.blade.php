@extends('Admin.Layout._layout')
@section('title')
    ایجاد فیلم
@endsection
@section('link')
    <!-- Internal Specturm-color picker css -->
    <link href="{{ loadA('plugins/spectrum-colorpicker/spectrum.css') }}" rel="stylesheet">

    <!-- Internal Ion.rangeslider css -->
    <link href="{{ loadA('plugins/ion-rangeslider/css/ion.rangeSlider.css') }}" rel="stylesheet">
    <link href="{{ loadA('plugins/ion-rangeslider/css/ion.rangeSlider.skinFlat.css') }}" rel="stylesheet">

    <!-- Wizard Form css -->
    <link href="{{ loadA('css-rtl/style/Custom.css') }}" rel="stylesheet">

    <!-- InternalFileupload css-->
    <link href="{{ loadA('plugins/fileuploads/css/fileupload.css') }}" rel="stylesheet" type="text/css" />

    <!-- filepond css-->
    <link href="https://unpkg.com/filepond@^4/dist/filepond.css" rel="stylesheet" />
    <link href="https://unpkg.com/filepond/dist/filepond.css" rel="stylesheet" />
    <link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css" rel="stylesheet" />
@endsection

@section('Content')
    <!-- Loader -->
    <div class="loader-div">
        <div class="modal-loader"></div>
    </div>
    <!-- End Loader -->

    <!-- Page Header -->
    <div class="page-header">
        <div>
            <h2 class="main-content-title tx-24 mg-b-5">ایجاد فیلم </h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#"></a>فیلمات</li>
                <li class="breadcrumb-item"> لیست فیلمات </li>
                <li class="breadcrumb-item active" aria-current="page"> ایجاد فیلم </li>
            </ol>
        </div>
    </div>
    <!-- End Page Header -->

    <!-- Row -->
    <div class="container">
        <div class="row row-sm">
            <div class="col-xl-12 col-lg-12 col-md-12">
                <div class="card custom-card">
                    <div class="card-body">
                        <div class="borderr">
                            <center>
                                <span class="step">1</span><span class="text-form-wizard">اطلاعات اولیه فیلم</span>
                                <span class="step">2</span><span class="text-form-wizard">آپلود فیلم</span>
                            </center>
                        </div>
                        <form id="Product-form" action="{{ route('Movieinsert') }}" method="POST" enctype="multipart/form-data">
							@csrf
                            <div class="col-12 borderr form-wizard-1 mt-4 mb-5">
                                <!-- form-wizard-page-1 -->
                                <div class="tab">
                                    <center>
                                        <h3>مشخصات فیلم</h3>
                                    </center>
                                    <div class="row row-sm mt-3">
                                        <div class="col-lg-2 form-group">
                                            <label class="form-label">نام فیلم : <span class="tx-danger">*</span></label>
                                            <input type="text" class="form-control" name="Name"
                                                placeholder="نام فیلم">
                                        </div>
                                        <div class="col-lg-2 form-group">
                                            <label class="form-label">زمان فیلم : <span class="tx-danger">*</span></label>
                                            <input type="text" class="form-control" name="Time" placeholder="زمان فیلم">
                                        </div>
                                        <div class="col-lg-2 form-group">
                                            <label class="form-label">سال ساخت : <span class="tx-danger">*</span></label>
                                            <input type="text" class="form-control" name="YearS" placeholder="سال ساخت فیلم" oninput="this.value = this.value.replace(/\D+/g, '')">
                                        </div>
                                        <div class="col-lg-2 form-group">
                                            <label class="form-label">امتیاز imdb : <span class="tx-danger">*</span></label>
                                            <input type="text" class="form-control" name="imdb" placeholder="امتیاز imdb فیلم" oninput="this.value = this.value.replace(/\D+/g, '')">
                                        </div>
                                        <div class="col-lg-2 form-group">
                                            <label class="form-label">رنج سنی: <span class="tx-danger">*</span></label>
                                            <select name="Ages" class="form-control select2">
                                                <option label="یکی را انتخاب کن"></option>
                                                @foreach ($Ages as $Age)
                                                    <option value="{{ $Age->id }}">{{ $Age->Ages }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-lg-2 form-group">
                                            <label class="form-label">کارگردان : <span class="tx-danger">*</span></label>
                                            <select name="Director" class="form-control select2">
                                                <option label="یکی را انتخاب کن"></option>
                                                @foreach ($Directors as $Director)
                                                    <option value="{{ $Director->id }}">{{ $Director->Name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row row-sm">
                                        <div class="col-lg-3">
                                            <p class="mg-b-10"></p>
                                            <label class="form-label">انتخاب ژانر ها : <span
                                                    class="tx-danger">*</span></label>
                                            <select name="Genres[]" class="form-control select2" multiple="multiple">
                                                @foreach ($Genres as $Genre)
                                                    <option value="{{ $Genre->id }}">{{ $Genre->Name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-lg-3">
                                            <p class="mg-b-10"></p>
                                            <label class="form-label">انتخاب زبان ها : <span
                                                    class="tx-danger">*</span></label>
                                            <select name="Langs[]" class="form-control select2" multiple="multiple">
                                                @foreach ($Langs as $Lang)
                                                    <option value="{{ $Lang->id }}">{{ $Lang->Name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-lg-3">
                                            <p class="mg-b-10"></p>
                                            <label class="form-label">انتخاب کشور ها : <span
                                                    class="tx-danger">*</span></label>
                                            <select name="Countries[]" class="form-control select2" multiple="multiple">
                                                @foreach ($Countries as $Country)
                                                    <option value="{{ $Country->id }}">{{ $Country->Name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-lg-3">
                                            <p class="mg-b-10"></p>
                                            <label class="form-label">انتخاب بازیگران : <span
                                                    class="tx-danger">*</span></label>
                                            <select name="Actors[]" class="form-control select2" multiple="multiple">
                                                @foreach ($Actors as $Actors)
                                                    <option value="{{ $Actors->id }}">{{ $Actors->Name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-lg-3">
                                            <p class="mg-b-10"></p>
                                            <label for="Hot" class="form-label">داغ ترین ها :</label>
                                                <input id="Hot" name="Hot" value="1" type="checkbox" class="custom-switch-input">
                                        </div>
                                    </div>
                                  
                                    <div class="row row-sm mt-3">
                                        <div class="col-lg-12">
                                            <label class="form-label">توضیحات فیلم : <span class="tx-danger">*</span></label>
                                            <textarea class="form-control" name="info" placeholder="توضیحات فیلم را وراد کنید" rows="3"></textarea>
                                        </div>
                                    </div>
                                    <button type="button" class="btn ripple btn-primary Product-insert me-1 float-left nextBtn mt-5" onclick="nextPrev(1)">بعدی</button>
                                </div>
                                <!-- form-wizard-page-2 -->
                                <div class="tab">
                                    <center>
                                        <h3 class="Title-form">آپلود فیلم</h3>
                                    </center>
                                    <div class="row row-vp  mt-2">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <p class="mg-b-10">کاورفیلم : </p>
                                                <input type="file" name="img" class="dropify" data-height="200">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <p class="mg-b-10">فیلم : </p>
                                                <input id="fileupload" name="Movie" type="file">
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" id="upload-button" disabled class="btn ripple btn-success me-1 float-left mt-5">آپلود</button>
                                </div>
                        </form>
                    </div>
                    <div class="mb-2 mt-2">
                        <button type="button" id="prevBtn" class="btn ripple btn-primary float-right"
                            onclick="nextPrev(-1)">قبلی</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- End Row -->
@endsection
@section('script')
    <!-- Jquery-Ui js-->
    <script src="{{ loadA('plugins/jquery-ui/ui/widgets/datepicker.js') }}"></script>

    <!-- Internal Jquery.maskedinput js-->
    <script src="{{ loadA('plugins/jquery.maskedinput/jquery.maskedinput.js') }}"></script>

    <!-- Internal Specturm-colorpicker js-->
    <script src="{{ loadA('plugins/spectrum-colorpicker/spectrum.js') }}"></script>

    <!-- Internal Ion-rangeslider js-->
    <script src="{{ loadA('plugins/ion-rangeslider/js/ion.rangeSlider.min.js') }}"></script>

    <!-- Wizard Form js-->
    <script src="{{ loadA('js/Custom/WizardForm.js') }}"></script>

    <!-- Internal Form-elements js-->
    <script src="{{ loadA('js/form-elements.js') }}"></script>

    <!-- Internal Parsley js-->
    <script src="{{ loadA('plugins/parsleyjs/parsley.min.js') }}"></script>

    <!-- Internal Form-validation js-->
    <script src="{{ loadA('js/form-validation.js') }}"></script>

    <!-- Internal Fileuploads js-->
    <script src="{{ loadA('plugins/fileuploads/js/fileupload.js ') }}"></script>
    <script src="{{ loadA('plugins/fileuploads/js/file-upload.js') }}"></script>

    <!-- Internal Fileuploads js-->
    <script src="{{ loadA('plugins/fileuploads/js/fileupload.js ') }}"></script>
    <script src="{{ loadA('plugins/fileuploads/js/file-upload.js') }}"></script>

    <!-- filepond css-->
    <script src="https://unpkg.com/filepond@^4/dist/filepond.js"></script>
    <script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>
    <script src="https://unpkg.com/filepond/dist/filepond.js"></script>
    <script>
        FilePond.registerPlugin(FilePondPluginImagePreview);
        const inputElement = document.getElementById('fileupload');
        const pond = FilePond.create(inputElement, {
            labelIdle: "ویدیو مورد نظر خود را وارد کنید",
        });
        pond.on('addfile', () => {
            document.getElementById('upload-button').setAttribute('disabled', 'true');
        });
        pond.on('processfile', () => {
            document.getElementById('upload-button').removeAttribute('disabled');
        });
        pond.on('removefile', () => {
            document.getElementById('upload-button').setAttribute('disabled', 'true');
        });
        FilePond.setOptions({
            server: {
                process: '/admin/temp/upload/Movie/Video',
                revert: '/admin/temp/delete/Movie/Video',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
            },
        });
    </script>
    <script>
        $(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('body').on('click', '.Product-update', function() {
                var errorAlert =
                    '<div class="alert alert-outline-danger mg-b-0" role="alert"><button aria-label="بستن" class="close" data-bs-dismiss="alert" type="button"><span aria-hidden="true">×</span></button><strong>خطا ! </strong>شما هیچ رنگی انتخاب نکردید</div>'
                $(".loader-div").show();
                $.ajax({
                    data: $('#Product-form').serialize(),
                    url: "{{ route('MovieCreate') }}",
                    type: "POST",
                    dataType: 'json',
                    success: function(data) {
                        if (data !== false) {
                            $(".alert").remove();
                            $(".CPN-inputs").remove();
                            $("#CPN").append(data.CPN);
                            $(".CPN-Product").removeClass('disabled');
                            $(".Title-form").text('قیمت و تعداد محصول');
                            $(".Title-form").removeClass('alert-danger');
                            $(".id-Product").val(data.id);
                            $(".loader-div").hide();
                        } else {
                            $(".alert").remove();
                            $(".CPN-inputs").remove();
                            $("#CPN").append(errorAlert);
                            $(".CPN-Product").addClass('disabled');
                            $("#nextBtn").attr('disabled', 'true');
                            $(".Title-form").text('خطا !');
                            $(".Title-form").addClass('alert-danger');
                            $(".loader-div").hide();
                        }
                    },
                })
            });
            $('body').on('click', '.CPN-Product', function() {
                $.ajax({
                    data: $('#Product-CPN').serialize(),
                    url: "{{ route('MovieUpdate') }}",
                    type: "POST",
                    dataType: 'json',
                    success: function(data) {
                        $(".id-Product").val(data.id);
                        $(".loader-div").hide();
                    },
                })
            });
            $('body').on('click', '.DSP-Product', function() {
                $(".loader-div").show();
                $.ajax({
                    data: $('#Product-DSP').serialize(),
                    url: "{{ route('MovieUpdate') }}",
                    type: "POST",
                    dataType: 'json',
                    success: function(data) {
                        $(".id-Product").val(data.id);
                        $(".Product-show-accept").remove();
                        $("#Product-show").append(data.Product_show);
                        $(".loader-div").hide();
                    },
                })
            });
            $('#Product-images').on('submit', function(event) {
                event.preventDefault();
                $.ajax({
                    url: "{{ route('MovieUpdate') }}",
                    method: "POST",
                    data: new FormData(this),
                    dataType: 'json',
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(data) {
                        $(".id-Product").val(data.id);
                    },
                })
            });
        });
        document.getElementById('Discount').onchange = function() {
            document.getElementById('Discount_number').disabled = !this.checked;
            document.getElementById('StartDiscount').disabled = !this.checked;
            document.getElementById('EndDiscount').disabled = !this.checked;
        };
        document.getElementById('suggested').onchange = function() {
            document.getElementById('Startsuggested').disabled = !this.checked;
            document.getElementById('Endsuggested').disabled = !this.checked;
        };
    </script>
@endsection
