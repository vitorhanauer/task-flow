<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $fillable = ['name'];
    
    public function users()
    {
        return $this->belongsToMany(User::class,'group_user','group_id','user_id');
    }

    public function tasks()
    {
        return $this->hasMany(Task::class,'group_id');
    }
}
