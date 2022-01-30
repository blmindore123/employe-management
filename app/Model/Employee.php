<?php

namespace App\Model;
use App\Model\Classes;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model{

    protected  $primaryKey = 'id';
    protected $table = 'employes';

    protected $fillable = ['id','department_id','name','email','phone','dob','photo','salery','status','created_at','updated_at'];
    protected $appends = ['image_url','age'];
    public function department(){
        return $this->hasOne('App\Model\Department','id','department_id');
    }
    public function getAgeAttribute(){
        return ($this->dob)?(new \Carbon\Carbon($this->dob))->age:"";
    }
    public function scopeNotDeleted($query){
        $query->where('status', '!=','deleted');
    }
    public function getImageUrlAttribute(){
        if(!empty($this->photo)){
            return url('public/uploads/employee/').'/'.$this->photo;  
        }else{
            return url('public/uploads/default.png'); 
        }
    }
}