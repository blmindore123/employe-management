
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">  {{env('APP_NAME')}} </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item {{(Request::segment(1)=='dashboard')?'active':''}}">
        <a class="nav-link" href="{{url('dashboard')}}"> Dashboard<br>All Data</a>
      </li>
      <li class="nav-item {{(Request::segment(1)=='department-wise')?'active':''}}">
        <a class="nav-link" href="{{url('department-wise')}}"> Department wise<br> highest salary</a>
      </li> 
      <li class="nav-item {{(Request::segment(1)=='salery-range')?'active':''}}">
        <a class="nav-link" href="{{url('salery-range')}}"> Salary Range wise<br> employee count</a>
      </li> 
      <li class="nav-item {{(Request::segment(1)=='youngest-employee')?'active':''}}">
        <a class="nav-link" href="{{url('youngest-employee')}}"> Youngest employee of<br> each department</a>
      </li> 
     
       
    </ul>
    <span class="form-inline my-2 my-lg-0"> Welcome! &nbsp; <b> {{ ucfirst(Session::get('user_info')['name'])}} </b>
    <a class="nav-link" href="{{url('logout')}}">Logout</a>
    </span>
  </div>
</nav>