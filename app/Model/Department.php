<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Department extends Model{

    protected  $primaryKey = 'id';
    protected $table = 'departments';

    protected $fillable = ['id','name','status','created_at','updated_at'];
    
}