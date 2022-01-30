@include('header')
@include('nav')
@push('header_styles')
<link  href="{{ url('admin/dist/css/jquery.dataTables.min.css') }}" rel="stylesheet">
@endpush 
<div class="row">
<div class="col-sm-12">
    <div class="card">
        <div class="card-header">
          <h5><strong> Employees List </strong></h5>
          <div class="card-header-right">
              <a type="button" style="border-radius: 25px; color: #fff;font-weight: 600;" class="btn btn-fill btn-info"  onclick="addEmployeeForm()">  Add Employee </a>
          </div>
        </div>
         <div class="card-block">
            <div class="dt-responsive table-responsive">
              
            <table id="table" class="table table-striped table-bordered nowrap">
                  <thead>
                     <tr>
                        <th scope="col">S.No</th>
                        <th scope="col">Image</th>
                        <th scope="col">Name</th>
                        <th scope="col">Department</th>
                        <th scope="col">Email</th>
                        <th scope="col">Phone No</th>
                        <th scope="col">DOB</th>
                        <th scope="col">Salery</th>
                        <th scope="col">Age</th>
                        <th scope="col">Action</th>
                     </tr>
                  </thead>
               </table>
            </div>
         </div>
      </div>
   </div>
</div>

   <!-- Modal -->
   <div class="modal fade" id="AddEmployeeForm" role="dialog">
 
  </div>

 

  <script src="{{ url('public/js/jquery.dataTables.min.js') }}" defer></script>
  <script type="text/javascript">
  var index_url = "{{url('employee/getData')}}";

  function addEmployeeForm(){
    $.ajax({
          url: "{{url('employee/create')}}",
          type: 'get',
          success: function (res) {
            $("#AddEmployeeForm").html(res);
            $("#AddEmployeeForm").modal();
          }
      });
  }
function editEmployeeData(id){
  $.ajax({
          url: "{{url('employee/edit-form')}}"+"/"+id,
          type: 'get',
          success: function (res) {
            $("#AddEmployeeForm").html(res);
            $("#AddEmployeeForm").modal();
          }
      });
}

function deleteEmployeeData(id){
  $.ajax({
          url: "{{url('employee/delete')}}"+"/"+id,
          type: 'get',
          success: function (response) {
            if(response.status){
                toastr.success(response.message);
                $('#table').DataTable().ajax.reload();
            }else{
                toastr.error(response.message);
            }
          }
      });
}

  $(function() { 
  $('#table').DataTable({
      "targets": [0], 
      processing: true,
      serverSide: false,
      scrollX : true,
      responsive: true,
      ajax: index_url,
      ordering: true,
      searching:false,
      columns: [
        {data: 'SrNo',
            render: function (data, type, row, meta) {
                return meta.row + 1;
            }, searchable: false, sortable: false
        },
       { data: null,
          render: function(data){
            return '<img class="img-circle" src="'+ data.image_url+'" style="width:50px;height:50px;object-fit:contain">';
          }, orderable: false
        },
        { data: null,
          render: function(data){
            return '<a>'+data.name+'</a>';
          }
        },
        { data: null,
          render: function(data){
            return '<a>'+data.department.name+'</a>';
          }
        },
        { data: null,
          render: function(data){
            return '<a>'+data.email+'</a>';
          }
        },
        { data: null,
          render: function(data){
            return '<a>'+data.phone+'</a>';
          }
        },
        { data: null,
          render: function(data){
            return '<a>'+data.dob+'</a>';
          }, orderable: false
        },
        { data: null,
          render: function(data){
            return '<a>'+data.salery+'</a>';
          }
        },
        { data: null,
          render: function(data){
            return '<a>'+data.age+'</a>';
          }
        },
        { data: null,
          render: function(data){
            var editBtn = '<a style="color:blue" href="javascript:void(0)" class="btn_edit" onclick="editEmployeeData('+data.id+')" >Edit</a>';
            var deleteBtn='<a style="margin-left:10px;color:red" href="javascript:void(0)" class="btn_edit" onclick="deleteEmployeeData('+data.id+')" >Delete</a>';;
            return editBtn + deleteBtn;
          }, orderable: "false"
        },
      ]
    });
 });
  </script>


@include('footer')