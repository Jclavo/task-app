<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = ['description',
                           'level_id',
                           'start_date',
                           'end_date',
                           'user_id'];
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
