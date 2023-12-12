@extends('Admin.Layout._layout')
@section('title')
   بازیگر ها
@endsection
@section('Content')
<!-- Page Header -->
<div class="page-header">
   <div>
      <h2 class="main-content-title tx-24 mg-b-5">بازیگر ها</h2>
      <ol class="breadcrumb">
         <li class="breadcrumb-item"><a href="#"></a>بازیگر فیلم و سریال ها</li>
         <li class="breadcrumb-item active" aria-current="page">بازیگر ها</li>
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
                     <label class="main-content-label my-auto">بازیگر ها</label>
                     <h6 class="mb-0 mr-auto"><a id="createNewActor" href="javascript:void(0)" class="btn btn-primary float-right dropify-clear"><ion-icon class="m-top" name="add-circle-outline"></ion-icon></a></h6>
                  </div>
                  <div class="table-responsive">
                     <table class="table border text-md-nowrap text-nowrap data-table-Actor">
                        <thead>
                        <tr>
                           <th>#</th>
                           <th>نام بازیگر</th>
                           <th>تصویر بازیگر</th>
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
            <h5 class="modal-title mb-4 text-center">از حذف کردن بازیگر اطمینان دارید ؟</h5>
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
<!-- Form Modal ActorModel -->
<div class="modal" id="ActorModel">
   <div class="modal-dialog wd-xl-400" role="document">
      <div class="modal-content">
         <div class="modal-body pd-20 pd-sm-40">
            <a href="javascript:void(0)" class="btnCloseModel"><ion-icon class="btn-colose-model" name="close-circle-outline"></ion-icon></a>
            <br>
            <h5 id="title-model" class="modal-title mb-4 text-center">ایجاد بازیگر</h5>
            <form dir="rtl" id="ActorForm" class="forms-sample text-right" method="POST" enctype="multipart/form-data">
               @csrf
               <div class="form-group">
                  <input type="text" class="form-control" id="Name-Actor" required name="Name" placeholder="نام بازیگر">
               </div>
               <div class="form-group">
                  <input type="text" class="form-control" id="Birthday-Actor" required name="Birthday" placeholder="سال تولد بازیگر"  oninput="this.value = this.value.replace(/\D+/g, '')">
               </div>
               <div class="form-group">
                  <textarea id="Description-Actor" class="form-control" name="Description" cols="30" rows="10" placeholder="درباره بازیگر"></textarea>
               </div>
               <div id="selectedimg" class="mb-3 mt-3"></div>
               <div class="input-group file-browser">
                  <label class="btn ripple btn-primary col-12">افزودن عکس<input type="file" id="imginput" name="img" style="display: none;"></label>
               </div>
               <input id="Actor-id" type="hidden" name="id">
               <button type="submit" id="btnActor" value="create" class="btn ripple btn-success col-12">ثبت اطلاعات</button>
            </form>
         </div>
      </div>
   </div>
</div>
<!-- End Form Modal ActorModel -->
@endsection
@section('script')
<script type="text/javascript">
     $(function() {
      $.ajaxSetup({
         headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
         }
      });
      var table = $('.data-table-Actor').DataTable({
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
         ajax: "{{ route('Actor') }}",
         columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'Name', name: 'Name'},
            {data: 'img', name: 'img', orderable: true, searchable: false},
            {data: 'action', name: 'action', orderable: true, searchable: false},
         ]
      });
      $('.table').removeClass('dataTable');

      $('#createNewActor').click(function () {
         $("#btnActor").removeClass('btn-warning');
         $("#btnActor").addClass('btn-success');
         $('#ActorForm').trigger("reset");
         $('#btnActor').val('create');
         $('#btnActor').text('ثبت اطلاعات');
         $('#title-model').text('ایجاد بازیگر');
         $('#ActorModel').modal('show');
         $('.dropify-filename-inner').text('');
      });
         
       $('body').on('click', '.editActor', function() {
            var id = $(this).data("id");
            $(".loader-div").show();
            $('#ActorModel').modal('show');
            $("#btnActor").removeClass('btn-success');
            $("#btnActor").addClass('btn-warning');
            $('#ActorForm').trigger("reset");
            $('#img-old').remove() 
            $('#imgshow').remove() 
            $('#imginput').val('');
            $('#title-model').text('ویرایش بازیگر');
            $('#btnActor').val('update');
            $('#btnActor').text('ویرایش اطلاعات');
            $('.form-check-Actor').remove();
            $.ajax({
                  data: {'id': id},
                  url: "{{ route('ActorEdite') }}",
                  type: "POST",
                  dataType: 'json',
                  success: function(data) {
                  $('#Actor-id').val(data.Actor.id);
                  $('#selectedimg').append(data.img) 
                  $('#Name-Actor').val(data.Actor.Name);
                  $('#Birthday-Actor').val(data.Actor.Birthday);
                  $('#Description-Actor').val(data.Actor.Description);
                  $('#imginput').val('');
                  $(".loader-div").hide();
                  },
               });
            });
       $('#ActorForm').on('submit',function(event){
         event.preventDefault();
         $(".loader-div").show();
         var value = $(this).parent().find('#btnActor').val();
         if(value === 'create'){
            var adress = "{{ route('Actorinsert') }}";
         }
         else{
            var adress = "{{ route('ActorUpdate') }}";
         }
         $.ajax({
            url: adress,
            method:"POST",
            data:new FormData(this),
            dataType: 'json',
            contentType: false,
            cache: false,
            processData: false,
            success:function(data)
            {
               $('#ActorModel').modal('hide');
               $('#ActorForm').trigger("reset");
               $('#imgsho').hide();
               $('#imginput').val('');
               $(".loader-div").hide();
               table.draw();
            },
            error: function (data) {
               console.log('Error:', data);
               $(".loader-div").hide();
            }
         })
      });

      $('body').on('click', '.deleteActor', function () {
          var id = $(this).data("id");
         $('#ConfirmDelete').modal('show');
         $('.AcceptDeleteActor').attr("data-id",id);
       }); 
       $('body').on('click', '.AcceptDeleteActor', function () { 
         var id = $(this).data("id");
         $.ajax({
            data:{'id':id },
            url: "{{ route('ActorDelete') }}",
            type: "POST",
            dataType: 'json',
            success: function (data) {
               $('#ConfirmDelete').modal('hide');
               table.draw();
            },
         });
      }); 
      $(".btnCloseModel").click(function() {
         $('#ActorModel').modal('hide');
         $('#ConfirmDelete').modal('hide');
         $('#ShowCategorysModel').modal('hide');
      });
   });     

   var selDiv = "";
   var storedFiles = [];
   $(document).ready(function () {
   $("#imginput").on("change", handleFileSelect);
   selDiv = $("#selectedimg");
   });
   function handleFileSelect(e) {
   var files = e.target.files;
   var filesArr = Array.prototype.slice.call(files);
   filesArr.forEach(function (f) {
      if (!f.type.match("image.*")) {
         return;
      }
      storedFiles.push(f);
      var reader = new FileReader();
      reader.onload = function (e) {
         var html =
         '<img src="' +e.target.result + "\" id='imgshow' class='img-thumbnail'>";
         selDiv.html(html);
      };
      reader.readAsDataURL(f);
   });
   }
</script>
@endsection