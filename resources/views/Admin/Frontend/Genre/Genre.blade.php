@extends('Admin.Layout._layout')
@section('title')
   ژانر ها
@endsection
@section('Content')
<!-- Page Header -->
<div class="page-header">
   <div>
      <h2 class="main-content-title tx-24 mg-b-5">ژانر ها</h2>
      <ol class="breadcrumb">
         <li class="breadcrumb-item"><a href="#"></a>ژانر فیلم و سریال ها</li>
         <li class="breadcrumb-item active" aria-current="page">ژانر ها</li>
      </ol>
   </div>
</div>
<!-- End Page Header -->
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
                     <label class="main-content-label my-auto">ژانر ها</label>
                     <h6 class="mb-0 mr-auto"><a id="createNewGenre" href="javascript:void(0)" class="btn btn-primary float-right dropify-clear"><ion-icon class="m-top" name="add-circle-outline"></ion-icon></a></h6>
                  </div>
                  <div class="table-responsive">
                     <table class="table border text-md-nowrap text-nowrap data-table-Genre">
                        <thead>
                        <tr>
                           <th>#</th>
                           <th>نام ژانر</th>
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
            <h5 class="modal-title mb-4 text-center">از حذف کردن ژانر اطمینان دارید ؟</h5>
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
<!-- Form Modal GenreModel -->
<div class="modal" id="GenreModel">
   <div class="modal-dialog wd-xl-400" role="document">
      <div class="modal-content">
         <div class="modal-body pd-20 pd-sm-40">
            <a href="javascript:void(0)" class="btnCloseModel"><ion-icon class="btn-colose-model" name="close-circle-outline"></ion-icon></a>
            <br>
            <h5 id="title-model" class="modal-title mb-4 text-center">ایجاد ژانر</h5>
            <form dir="rtl" id="GenreForm" class="forms-sample text-right" method="POST" enctype="multipart/form-data">
               @csrf
               <div class="form-group">
                  <p class="mg-b-10">نام</p>
                  <input type="text" class="form-control" id="Name-Genre" required name="Name" placeholder="نام ژانر">
               </div>
               <div class="form-group">
                  <p class="mg-b-10">توضیحات</p>
                  <input type="text" class="form-control" id="Description-Genre" name="Description" placeholder="توضیحات ژانر">
               </div>
               <input id="Genre-id" type="hidden" name="id">
               <button type="submit" id="btnGenre" value="create" class="btn ripple btn-success col-12">ثبت اطلاعات</button>
            </form>
         </div>
      </div>
   </div>
</div>
<!-- End Form Modal GenreModel -->

@endsection
@section('script')
<script type="text/javascript">
     $(function() {
      $.ajaxSetup({
       headers: {
           'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
       }
      });
      var table = $('.data-table-Genre').DataTable({
         bAutoWidth:false,
         processing: true,
         serverSide: true,
         "language": {
            "info": "نمایش _START_ تا _END_ از _TOTAL_ نتیجه",
            "sSearch" : "جست و جو : ",
            "sProcessing": "درحال بارگذاری ...",
            "sLengthMenu": "نمایش _MENU_ اطلاعات",
            "sLoadingRecords": "بارگذاری ....",
            "spolite": "نمایش _START_ تا _END_ از _TOTAL_ نتیجه",
            "sInfoFiltered": "(نتیجه جست و جو شما از  _MAX_ اطلاعات)",
            "sZeroRecords" : "هیچ اطلاعاتی برای جست و جو شما پیدا نشد",
            "sInfoEmpty" : "نمایش رکوردها از 0 تا 0 از مجموع 0 رکورد",
            "oPaginate": {
               "sFirst": "اولین",
               "sLast": "آخرین",
               "sNext": "بعدی",
               "sPrevious": "قبلی"
            },
         },
         ajax: "{{ route('Genre') }}",
         columns: [
               {data: 'DT_RowIndex', name: 'DT_RowIndex'},
               {data: 'Name', name: 'Name'},
               {data: 'action', name: 'action', orderable: true, searchable: false},
         ]
      });
      $('.table').removeClass('dataTable');

      $('#createNewGenre').click(function () {
         $("#btnGenre").removeClass('btn-warning');
         $("#btnGenre").addClass('btn-success');
         $('#GenreForm').trigger("reset");
         $('#btnGenre').val('create');
         $('#suggested-Genre').removeAttr('checked');
         $('#btnGenre').text('ثبت اطلاعات');
         $('#title-model').text('ایجاد ژانر');
         $('#GenreModel').modal('show');
         $('.dropify-filename-inner').text('');
      });
         
       $('body').on('click', '.editGenre', function() {
         var id = $(this).data("id");
         $(".loader-div").show();
         $("#btnGenre").removeClass('btn-success');
         $("#btnGenre").addClass('btn-warning');
         $('#GenreForm').trigger("reset");
         $('#title-model').text('ویرایش ژانر');
         $('#btnGenre').val('update');
         $('#btnGenre').text('ویرایش اطلاعات');
         $('#img').val('');
          $.ajax({
             data:{'id':id },
             url: "{{ route('GenreEdite') }}",
             type: "POST",
             dataType: 'json',
             success: function (data) {
               $('#Genre-id').append('<input type="hidden" name="id" value="'+data.id+'" >');
               $('#Name-Genre').val(data.Name);
               $('#Description-Genre').val(data.Description);
               $(".loader-div").hide();
             },
          });
          $('#GenreModel').modal('show');
       });

      $('#GenreForm').on('submit', function(event) {
         event.preventDefault();
         $(".loader-div").show();
         var value = $(this).parent().find('#btnGenre').val();
         if(value === 'create'){
            var adress = "{{ route('Genreinsert') }}";
         }
         else{
            var adress = "{{ route('GenreUpdate') }}";
         }
         $.ajax({
               url: adress,
               method: "POST",
               data: $('#GenreForm').serialize(),
               dataType: 'json',
               success : function(data){
                  $('#GenreModel').modal('hide');
                  $('#GenreForm').trigger("reset");
                  $(".loader-div").hide();
                  table.draw();
               },
               error: function(data) {
                  console.log('Error:', data);
                  $(".loader-div").hide();
               }
            })
         });

      $('body').on('click', '.deleteGenre', function () {
          var id = $(this).data("id");
         $('#ConfirmDelete').modal('show');
         $('.AcceptDelete').attr("data-id",id);
       });
       $('body').on('click', '.AcceptDelete', function () {    
          var id = $(this).data("id");
          $.ajax({
             data:{'id':id },
             url: "{{ route('GenreDelete') }}",
             type: "POST",
             dataType: 'json',
             success: function (data) {
                $('#ConfirmDelete').modal('hide');
                table.draw();
             },
          });
       }); 
      $(".btnCloseModel").click(function(){
         $('#GenreModel').modal('hide');
         $('#ConfirmDelete').modal('hide');
      });
   }); 
</script>
@endsection