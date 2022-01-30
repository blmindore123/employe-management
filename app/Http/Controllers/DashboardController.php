<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Repository\EmployeeRepository;
use Session;
use App\User;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

  class DashboardController extends Controller {

    /**
     * Show the application tournament.
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function __construct(EmployeeRepository $employeeRepository,User $user){   
        $this->user = $user;
        $this->employeeRepository = $employeeRepository;
    }
    
    /**
     * Function : index
     * Desc : show dashboard data
     */
    public function index(){
        if (isset(Session::get('user_info')['id'])){
            $user_list = $this->user->where('id','!=',Session::get('user_info')['id'])->get();
            return view('dashboard', ['user_list' => $user_list]);
        }else{
            return redirect('/');
        }
    }
    /**
     * Function : departmentWise
     * Desc : show employee list department wise
     */
    public function departmentWise(){
        return view('employee.department-wise');
    }
    /**
     * Function : departmentWiseFilter
     * Desc : get employee data department wise filter
     */
    public function departmentWiseFilter(){
         try {
            $employees = $this->employeeRepository->getDepartmentWiseFilter();
            return datatables()->of($employees)->toJson();
        } catch (\Exception $e) {
            return redirect('dashboard')->with('error',$e->getMessage());
        }
    }
    /**
     * Function : getemployeeCountViaSaleryRangeData
     * Desc : get employee count via salery range wise
     */
    public function getemployeeCountViaSaleryRangeData(){
        $saleryRange = $this->employeeRepository->getEmployeeCountViaSaleryRange();
        return view('employee.salery-range',compact('saleryRange'));
    }

    /**
     * Function : youngestEomplyee
     * Desc : youngest employee view load
     */
    public function youngestEomplyee(){
        return view('employee.youngest_employee');
    }

    /**
     * Function : getYoungestEmployeeDepartmentWise
     * Desc : get youngest employee department wise
     */
    public function getYoungestEmployeeDepartmentWise(){
        $employees = $this->employeeRepository->getYoungestEmployeeDepartmentWise();
        return datatables()->of($employees)->toJson();
    }
   

}