<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    //
    protected $guarded=[];
    protected $fillable=['name','slug'];
    public function tasks(){
    	return $this->hasMany('App\Task');
    }
    public function getRoutekeyName(){
    	return 'slug';
    }

}
