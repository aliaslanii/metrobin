@extends('Admin.Layout._layout')
@section('title')
    لیست سن ها
@endsection
@section('Content')
    <!-- PAges Header -->
    <div class="page-header">
        <div>
            <h2 class="main-content-title tx-24 mg-b-5">لیست سن ها</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#"></a>لیست سن ها</li>
                <li class="breadcrumb-item active" aria-current="page">سن ها</li>
            </ol>
        </div>
    </div>
    <!-- End PAges Header -->
    <!-- Row -->
    <div class="row row-sm">
        <div class="col-xl-3">
        </div>
        <div class="col-xl-6 col-lg-12 col-md-12">
            <div class="card custom-card">
                <div class="card-body">
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="orders" role="tabpanel">
                            <div class="d-flex mb-4">
                                <label class="main-content-label my-auto">لیست سن ها</label>
                                <h6 class="mb-0 mr-auto"><a href="javascript:void(0)" id="createNewAges"
                                        class="btn btn-primary float-right dropify-clear"><ion-icon class="m-top"
                                            name="add-circle-outline"></ion-icon></a></h6>
                            </div>
                            <div class="table-responsive">
                                <table class="table border text-md-nowrap text-nowrap data-table-Ages">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>سن</th>
                                            <th>عملیات</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3">
        </div>
    </div>
    <!--End Row -->

<!-- Form Modal ConfirmDelete -->
<div class="modal" id="ConfirmDelete">
   <div class="modal-dialog wd-xl-400" role="document">
      <div class="modal-content">
         <div class="modal-body pd-20 pd-sm-40">
            <a href="javascript:void(0)" class="btnCloseModel"><ion-icon class="btn-colose-model" name="close-circle-outline"></ion-icon></a>
            <br>
            <h5 class="modal-title mb-4 text-center">از حذف کردن سن اطمینان دارید ؟</h5>
            <div class="row">
               <div class="col-6"></div>
               <div class="col-6">
                  <a href="javascript:void(0)" type="submit" class="btn ripple btn-primary btnCloseModel">بیخیال !</a>
                  <a href="javascript:void(0)" type="submit" class="btn ripple btn-danger me-1 AcceptDelete">حذف</a>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<!-- End Form Modal ConfirmDelete -->
<!-- Form Modal AgesModel -->
<div class="modal" id="AgesModel">
   <div class="modal-dialog wd-xl-400" role="document">
      <div class="modal-content">
         <div class="modal-body pd-20 pd-sm-40">
            <a href="javascript:void(0)" class="btnCloseModel"><ion-icon class="btn-colose-model" name="close-circle-outline"></ion-icon></a>
            <br>
            <h5 id="title-model" class="modal-title mb-4 text-center">ایجاد سن</h5>
            <form dir="rtl" id="AgesForm" class="forms-sample text-right" method="POST" enctype="multipart/form-data">
               @csrf
               <div class="form-group">
                  <p class="mg-b-10">نام</p>
                  <input type="text" class="form-control" id="Name-Ages" required name="Ages" placeholder="نام سن">
               </div>
               <input id="Ages-id" type="hidden" name="id">
               <button type="submit" id="btnAges" value="create" class="btn ripple btn-success col-12">ثبت اطلاعات</button>
            </form>
         </div>
      </div>
   </div>
</div>
<!-- End Form Modal AgesModel -->
@endsection
@section('script')
    <script type="text/javascript">
        $(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var table = $('.data-table-Ages').DataTable({
                bAutoWidth: false,
                processing: true,
                serverSide: true,
                "language": {
                    "info": "نمایش _START_ تا _END_ از _TOTAL_ نتیجه",
                    "sSearch": "جست و جو : ",
                    "sProcessing": "درحال بارگذاری ...",
                    "sLengthMenu": "نمایش _MENU_ اطلاعات",
                    "sLoadingRecords": "بارگذاری ....",
                    "sInfoFiltered": "(نتیجه جست و جو شما از  _MAX_ اطلاعات)",
                    "sZeroRecords": "هیچ اطلاعاتی برای جست و جو شما پیدا نشد",
                    "sInfoEmpty": "نمایش رکوردها از 0 تا 0 از مجموع 0 رکورد",
                    "oPaginate": {
                        "sFirst": "اولین",
                        "sLast": "آخرین",
                        "sNext": "بعدی",
                        "sPrevious": "قبلی"
                    },
                },
                ajax: "{{ route('Ages') }}",
                columns: [
                     {data: 'DT_RowIndex',name: 'DT_RowIndex'},
                     {data: 'Ages', name: 'Ages'},
                     {data: 'action',name: 'action',orderable: true,searchable: false},
                  ]
            });
            $('.table').removeClass('dataTable');
            $('#createNewAges').click(function() {
                $("#btnAges").removeClass('btn-warning');
                $("#btnAges").addClass('btn-success');
                $('#AgesForm').trigger("reset");
                $('#btnAges').val('create');
                $('#suggested-Ages').removeAttr('checked');
                $('#btnAges').text('ثبت اطلاعات');
                $('#title-model').text('ایجاد سن');
                $('#AgesModel').modal('show');
                $('.dropify-filename-inner').text('');
            });

            $('body').on('click', '.editAges', function() {
                var id = $(this).data("id");
                $(".loader-div").show();
                $("#btnAges").removeClass('btn-success');
                $("#btnAges").addClass('btn-warning');
                $('#AgesForm').trigger("reset");
                $('#title-model').text('ویرایش سن');
                $('#btnAges').val('update');
                $('#btnAges').text('ویرایش اطلاعات');
                $('#img').val('');
                $.ajax({
                    data: {'id': id},
                    url: "{{ route('AgesEdite') }}",
                    type: "POST",
                    dataType: 'json',
                    success: function(data) {
                        $('#Ages-id').append('<input type="hidden" name="id" value="' + data.id + '" >');
                        $('#Name-Ages').val(data.Ages);
                        $(".loader-div").hide();
                    },
                });
                $('#AgesModel').modal('show');
            });

            $('#AgesForm').on('submit', function(event) {
                event.preventDefault();
                $(".loader-div").show();
                var value = $(this).parent().find('#btnAges').val();
                if (value === 'create') {
                    var adress = "{{ route('Agesinsert') }}";
                } else {
                    var adress = "{{ route('AgesUpdate') }}";
                }
                $.ajax({
                    url: adress,
                    method: "POST",
                    data: $('#AgesForm').serialize(),
                    dataType: 'json',
                    success: function(data) {
                        $('#AgesModel').modal('hide');
                        $('#AgesForm').trigger("reset");
                        $(".loader-div").hide();
                        table.draw();
                    },
                    error: function(data) {
                        $(".loader-div").hide();
                    }
                })
            });

            $('body').on('click', '.deleteAges', function() {
                var id = $(this).data("id");
                $('#ConfirmDelete').modal('show');
                $('.AcceptDelete').attr("data-id", id);
            });
            $('body').on('click', '.AcceptDelete', function() {
                var id = $(this).data("id");
                $.ajax({
                    data: {'id': id},
                    url: "{{ route('AgesDelete') }}",
                    type: "POST",
                    dataType: 'json',
                    success: function(data) {
                        $('#ConfirmDelete').modal('hide');
                        table.draw();
                    },
                });
            });
            $(".btnCloseModel").click(function() {
               $('#AgesModel').modal('hide');
               $('#ConfirmDelete').modal('hide');
            });
        });
    </script>
@endsection
