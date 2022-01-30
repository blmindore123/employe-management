<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(){
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        if($this->id){
            return [
                'name'=>'required',
                'department_id'=>'required',
                'email' => 'required|email|unique:employes,email,'.$this->id,
                'phone'=>'required|numeric|min:10|unique:employes,phone,'.$this->id,
                'dob'=>'required',
                'salery'=>'required|numeric'
              ];
        }else{
            return [
                'name'=>'required',
                'department_id'=>'required',
                'image' => 'required',
                'email' => 'required|email|unique:employes',
                'phone'=>'required|numeric|min:10|unique:employes',
                'dob'=>'required',
                'salery'=>'required|numeric'
              ];
        }
       
       
        
    }

     /**
     * Custom message for validation
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required'=>'Please enter emplpoyee name',
            'photo.required'=>'Please select image',
            'department_id.required'=>'Please select department',
            'email.required'=>'Please enter email address',
            'email.email'=>'Please enter valid email address',
            'email.unique'=>'These email address already exist',
            'phone.required'=>'Please enter phone number',
            'phone.numeric'=>'Please enter valid phone numebr',
            'phone.min'=>'Please enter 10 digit phone number',
            'phone.unique'=>'These phone number already exist',
            'salary.required'=>'Please enter salery',
            'dob.required'=>'Please enter DOB',
            'salery.required'=>'Please enter salery'

        ];
    }
}