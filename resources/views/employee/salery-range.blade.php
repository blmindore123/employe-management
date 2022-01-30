@include('header')
@include('nav')
@push('header_styles')
<link  href="{{ url('admin/dist/css/jquery.dataTables.min.css') }}" rel="stylesheet">
@endpush 
<div class="row">
<div class="col-sm-12">
    <div class="card">
        <div class="card-header">
          <h5><strong> Salary Range wise employee count </strong></h5>
        </div>
         <div class="card-block">
            <div class="dt-responsive table-responsive">
              
            <table id="table" class="table table-striped table-bordered nowrap">
                  <thead>
                     <tr>
                        <th scope="col">Total Employees</th>
                        <th scope="col">(0-50000) Employees Count</th>
                        <th scope="col">(50000-100000) Employees Count</th>
                        <th scope="col">(100000 Above) Employees Count</th>
                     </tr>
                  </thead>
                  @if(isset($saleryRange) && !empty($saleryRange))
                    <tr>
                        <th scope="col">{{$saleryRange['total']}}</th>
                        <th scope="col">{{$saleryRange['0-50000']}}</th>
                        <th scope="col">{{$saleryRange['50000-100000']}}</th>
                        <th scope="col">{{$saleryRange['>100000']}}</th>
                     </tr>
                     @endif
                  <tbody>
                  </tbody>
               </table>
            </div>
         </div>
      </div>
   </div>
</div>





@include('footer')