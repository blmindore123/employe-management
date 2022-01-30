<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Repository\EmployeeRepository;
use App\Http\Requests\EmployeeRequest;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use DataTables;
class EmployeeController extends Controller {

    /**
     * Show the application employee.
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function __construct(EmployeeRepository $employeeRepository){   
        $this->employeeRepository = $employeeRepository;
    }
    /**
     * Function : getData
     * Desc : get employee data
     */
    public function getData(Request $request){ 
        try {
            $employees = $this->employeeRepository->getEmployeeList($request);
            return datatables()->of($employees)->toJson();
        } catch (\Exception $e) {
            return redirect('dashboard')->with('error',$e->getMessage());
        }
    }
    /**
     * Function : create
     * Desc : employee create view
     */
    public function create(){
        $departments = $this->employeeRepository->getDepartmentList();
        return view('employee.create',compact('departments'));
    }
    /**
     * Function : store
     * Desc : save employee data
     */
    public function store(EmployeeRequest $request){
        try {
            return $this->employeeRepository->store($request);
        } catch (\Exception $e) {
            return ['status'=>false,'message'=>$e->getMessage(),'errors'=>array('message'=>$e->getMessage())];
        }
    }
    /**
     * Function : getEmployeeDetails
     * Desc : get employee details
     */
    public function getEmployeeDetails($id){
        try {
            $departments = $this->employeeRepository->getDepartmentList();
            $employee =  $this->employeeRepository->getEmployeeDetails($id);
            return view('employee.edit',compact('employee','departments'));
        } catch (\Exception $e) {
            return ['status'=>false,'message'=>$e->getMessage(),'errors'=>array('message'=>$e->getMessage())];
        }
    }
    /**
     * Function : update
     * Desc : update employee details
     */
    public function update(EmployeeRequest $request){
        try {
            return $this->employeeRepository->update($request);
        } catch (\Exception $e) {
            return ['status'=>false,'message'=>$e->getMessage(),'errors'=>array('message'=>$e->getMessage())];
        }
    }
      /**
     * Function : deleted
     * Desc : delete employee data
     */
    public function delete($id){ 
        try {
            $delete = $this->employeeRepository->delete($id);
            if($delete){   
                return ['success'=>true,'message'=>'Employee deleted successfully'];
            }else{
               return ['success'=>false,'message'=>'Something went wrong !!'];
           }
       } catch (\Exception $e) {
           return ['success'=>false,'message'=>$e->getMessage(),'errors'=>array('message'=>$e->getMessage())];
       }
    }
   
}