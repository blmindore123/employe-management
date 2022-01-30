<?php 
namespace App\Repository;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use App\Model\Department;
use App\Model\Employee;
use App\Model\StudentScore;
use App\Helpers\imageHelper;
use Illuminate\SuTeamspport\Facades\Storage;
use DB;
class EmployeeRepository {

    public function __construct(Department $department,Employee $employee){
        $this->department = $department;
        $this->employee = $employee;
   }

    /**
     * Function : getEmployeeList
     * Desc : get all employee list
     */
    public function getEmployeeList(){
        return $this->employee->with('department:id,name')->NotDeleted()->orderBy('id','desc')->get();
    }
   
    /**
     * Function : getDepartmentList
     * Desc: get department list
     */
    public function getDepartmentList(){
        return $this->department->where('status','active')->orderBy('name','asc')->get();
    }
    /**
     * Function : store
     * Desc : save employee data
     */
    public function store($request){
        $image='';
        if(isset($request['image']) && !empty($request['image'])){
            $image  = uploadImage($request['image'],'employee');
        }
        $dob = date("Y-m-d",strtotime($request['dob']));
        $requestData = ['name' => $request->name,'department_id'=>$request['department_id'],'email'=>$request['email'],'photo'=>$image,'dob'=>$dob,'salery'=>$request['salery'],'phone'=>$request['phone']];
        $student = $this->employee->create($requestData);
        if(!empty($student)){
            return ['status'=>true,'message'=>'Employee Information added successfully','error'=>'','data'=>[]];
        }else{
            return ['status'=>false,'message'=>'Something went wrong !!','error'=>array('message'=>'Something went wrong !!')];
        }
    }
    /**
     * Function : getEmployeeDetails
     * Desc : get employee details
     */
    public function getEmployeeDetails($id){
        return $this->employee->with('department:id,name')->where('id',$id)->first();
    }

    /**
     * Function : update
     * Desc : update employee details
     */
    public function update($request){
        $employee =  $this->employee->where('id',$request['id'])->first(); 
        if(!empty($employee)){
            $image='';
            if(isset($request['image']) && !empty($request['image'])){
                deleteImage('employee',$employee->photo);
                $image  = uploadImage($request['image'],'employee');
                $employee->photo = $image;
            }
            $dob                    = date("Y-m-d",strtotime($request['dob']));
            $employee->name         = $request->name;
            $employee->department_id= $request->department_id;
            $employee->email        = $request->email;
            $employee->dob          = $dob;
            $employee->salery       = $request->salery;
            $employee->phone        = $request->phone;
            if($employee->save()){
                return ['status'=>true,'message'=>'Employee Information added successfully','error'=>'','data'=>[]];
            }
            return ['status'=>false,'message'=>'Something went wrong !!','error'=>array('message'=>'Something went wrong !!')];
        }
        return ['status'=>false,'message'=>'Something went wrong !!','error'=>array('message'=>'Something went wrong !!')];
    }

    /**
     * Function : delete
     * Desc : delete employee 
     */
    public function delete($id) {
        return $this->employee->where('id',$id)->update(['status'=>'deleted']);
     }
   
      /**
     * Function : getDepartmentWiseFilter
     * Desc : get department wise filter
     */
    public function getDepartmentWiseFilter(){
        return $this->employee->with('department:id,name')->NotDeleted()->orderBy('salery','desc')->groupBy('department_id')
                ->select('id','department_id','name','email','phone','dob','photo')
                ->selectRaw('max(salery) as salery')->get();
    }
    /**
     * Function : getEmployeeCountViaSaleryRange
     * Desc : get employee count via salery range
     */
    public function getEmployeeCountViaSaleryRange(){
        return $this->employee
                ->NotDeleted()
                ->selectRaw('count(*) as total')
                ->selectRaw(\DB::raw('sum(CASE WHEN salery BETWEEN 0 AND 50000 THEN 1 ELSE 0 END) as "0-50000"'))
                ->selectRaw(\DB::raw('sum(CASE WHEN salery BETWEEN 50000 AND 100000 THEN 1 ELSE 0 END) as "50000-100000"'))
                ->selectRaw(\DB::raw('sum(CASE WHEN salery > 100000 THEN 1 ELSE 0 END) as ">100000"'))
                ->first();
    }
    /**
     * Function : getYoungestEmployeeDepartmentWise
     * Desc : get youngest employee department wise
     */
    public function getYoungestEmployeeDepartmentWise(){
        return $this->employee->with('department:id,name')
                        ->NotDeleted()
                        ->select('id','department_id','name','email','phone','dob','photo','salery')
                        ->selectRaw('max(dob) as dob')
                        ->orderBy('dob','desc')
                        ->groupBy('department_id')
                        ->get();
    }

     
}