<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    //
    protected $fillable = ['description'];
    
    public function tasks()
    {
        return $this->hasMany(Task::class);
    }
}
