<div class="modal-dialog">
    
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
       <h4 class="modal-title"> Add Employee </h4>
      </div>
    <form method="POST" action="{{url('employee/store')}}" enctype="multipart/form-data" id="add-employee">
    @csrf
    <div class="modal-body">
    <div class="row">    
        <div class="form-group col-sm-4">
            <label for="name"> Name</label>
        </div>
        <div class="form-group col-sm-8">
            <input type="text" class="form-control" id="name" name="name" value="" placeholder="Enter Name">
        </div>
    </div>
    <div class="row">    
        <div class="form-group col-sm-4">
            <label for="name"> Department</label>
        </div>
        <div class="form-group col-sm-8">
            <select class="form-control" name="department_id" id="department_id" title="Select Class">
                <option value="">Select Department</option>
                @if(isset($departments) && !empty($departments))
                    @foreach($departments as $department)
                        <option value="{{$department->id}}">{{$department->name}}</option>
                    @endforeach
                @endif
            </select>
        </div>
    </div>

   
    <div class="row">    
        <div class="form-group col-sm-4">
            <label for="price"> Employee Image :</label>
        </div>
        <div class="form-group col-sm-8">
            <input type="file" class="form-control" id="image" name="image" accept="image/*">
        </div>
    </div>
    <div class="row">    
        <div class="form-group col-sm-4">
        <label for="name"> Email</label>
        </div>
        <div class="form-group col-sm-8">
            <input type="email" class="form-control" id="email" name="email" value="" placeholder="Enter email">
            
        </div>
    </div>
    <div class="row">    
        <div class="form-group col-sm-4">
        <label for="name"> Phone No</label>
        </div>
        <div class="form-group col-sm-8">
            <input type="text" class="form-control" id="phone" name="phone" value="" placeholder="Enter phone no">
            
        </div>
    </div>
   
    <div class="row">    
        <div class="form-group col-sm-2">
            <label for="name"> DOB</label>
        </div>
        <div class="form-group col-sm-4">
            <input type="date" class="form-control" id="dob" name="dob" value="" placeholder="Enter DOB">
        </div>
        <div class="form-group col-sm-2">
            <label for="name"> Salery</label>
        </div>
        <div class="form-group col-sm-4">
            <input type="text" class="form-control" id="salery" name="salery" value="" placeholder="Enter salery">
        </div>
     </div>
      <div class="modal-footer">
         <button type="submit" style="margin-top: 14px; background-color: #31b0d5; border-color: #31b0d5;" id="save_btn" class="btn btn-info" >Submit</button>
         <button type="button" style="margin-top: 14px; background-color: #31b0d5; border-color: #31b0d5;" class="btn btn-info" data-dismiss="modal">Close</button>
     </div>

      </form>
    </div>
    
  </div>
  {!! JsValidator::formRequest('App\Http\Requests\EmployeeRequest','#add-employee') !!}
  <script>
           $("#save_btn").on('click', (function (e) {
           e.preventDefault();
           var frm = $('#add-employee');
           if (frm.valid()) {
               showButtonLoader('save_btn', 'Save', 'disable');
               $.ajax({
                   url: "{{url('employee/store')}}",
                   type: "POST",
                   data: new FormData(frm[0]),
                   contentType: false,
                   cache: false,
                   processData: false,
                   success: function (response)
                   {
                       showButtonLoader('save_btn', 'Save', 'enable');
                       if(response.status){
                           toastr.success(response.message);
                           $("#AddStudentForm").modal('hide');
                           location.reload();
                       }else{
                           toastr.error(response.message);
                       }
                   },
                   error: function (response) {
                       showButtonLoader('save_btn', 'Save', 'enable');
                       (response.message)?toastr.error(response.message, 'Student'):'';
                       $(".invalid-feedback").text('');
                       $(".invalid-feedback").css('display','block');
                       var errors = $.parseJSON(response.responseText);
                        $.each(errors.errors, function (key, val) {
                          $("#" + key + "-error").text(val);
                        });
                   },
               });
           }
       }));
       </script>