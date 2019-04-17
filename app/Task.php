<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = ['description','level','user_id'];
    //
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function level()
    {
        return $this->belongsTo(Level::class);
    }
}
