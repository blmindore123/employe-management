<div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
       <h4 class="modal-title"> Edit Employee </h4>
      </div>
    <form method="POST" action="{{url('employee/update')}}" enctype="multipart/form-data" id="edit-employee">
    @csrf
    <div class="modal-body">
    <input type="hidden" name="id" value="{{$employee->id}}">
    <div class="row">    
        <div class="form-group col-sm-4">
            <label for="name"> Name</label>
        </div>
        <div class="form-group col-sm-8">
            <input type="text" class="form-control" id="name" name="name" value="{{$employee->name}}" placeholder="Enter Name">
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
                        <option {{($department->id==$employee->department_id)?'selected':''}} value="{{$department->id}}">{{$department->name}}</option>
                    @endforeach
                @endif
            </select>
        </div>
    </div>
    <div class="row">    
        <div class="form-group col-sm-3">
            <label for="price">Image :</label>
        </div>
        <div class="form-group col-sm-6">
            <input type="file" class="form-control" id="image" name="image" accept="image/*" onchange="previewImage(event)">
        </div>
        <div class="form-group col-sm-3">
        '<img class="img-circle" id="employee-image" src="{{$employee->image_url}}" style="width:50px;height:50px;object-fit:contain">
        </div>
    </div>
    <div class="row">    
        <div class="form-group col-sm-4">
        <label for="name"> Email</label>
        </div>
        <div class="form-group col-sm-8">
            <input type="email" class="form-control" id="email" name="email" value="{{$employee->email}}" placeholder="Enter email">
        </div>
    </div>
    <div class="row">    
        <div class="form-group col-sm-4">
        <label for="name"> Phone No</label>
        </div>
        <div class="form-group col-sm-8">
            <input type="text" class="form-control" id="phone" name="phone" value="{{$employee->phone}}" 
                placeholder="Enter phone no">
        </div>
    </div>
   
    <div class="row">    
        <div class="form-group col-sm-2">
            <label for="name"> DOB</label>
        </div>
        <div class="form-group col-sm-4">
            <input type="date" class="form-control" id="dob" name="dob" value="{{$employee->dob}}" placeholder="Enter DOB">
        </div>
        <div class="form-group col-sm-2">
            <label for="name"> Salery</label>
        </div>
        <div class="form-group col-sm-4">
            <input type="text" class="form-control" id="salery" name="salery" value="{{$employee->salery}}" placeholder="Enter salery">
        </div>
     </div>
      <div class="modal-footer">
         <button type="submit" style="margin-top: 14px; background-color: #31b0d5; border-color: #31b0d5;" id="updateBtn" class="btn btn-info" >Update</button>
         <button type="button" style="margin-top: 14px; background-color: #31b0d5; border-color: #31b0d5;" class="btn btn-info" data-dismiss="modal">Close</button>
     </div>

      </form>
    </div>
    
  </div>
  {!! JsValidator::formRequest('App\Http\Requests\EmployeeRequest','#edit-employee') !!}
  <script>
           $("#updateBtn").on('click', (function (e) {
           e.preventDefault();
           var frm = $('#edit-employee');
           if (frm.valid()) {
               showButtonLoader('updateBtn', 'Update', 'disable');
               $.ajax({
                   url: "{{url('employee/update')}}",
                   type: "POST",
                   data: new FormData(frm[0]),
                   contentType: false,
                   cache: false,
                   processData: false,
                   success: function (response)
                   {
                       showButtonLoader('updateBtn', 'Update', 'enable');
                       if(response.status){
                           toastr.success(response.message);
                           $("#AddEmployeeForm").modal('hide');
                           $('#table').DataTable().ajax.reload();
                       }else{
                           toastr.error(response.message);
                       }
                   },
                   error: function (response) {
                       showButtonLoader('updateBtn', 'Update', 'enable');
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
    const previewImage = e => {
        const preview = document.getElementById('employee-image');
        preview.src = URL.createObjectURL(e.target.files[0]);
        preview.onload = () => URL.revokeObjectURL(preview.src);
    };
       </script>