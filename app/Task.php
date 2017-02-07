<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    //
    protected $fillable=['project_id','name','slug','completed','description'];
    public function project(){
    	return $this->belongsTo('App\Project');
    }
}
