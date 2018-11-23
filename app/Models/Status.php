<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    //一对多关系

    protected $fillable = ['content'];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    
}
