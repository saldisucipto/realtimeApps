<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Reply extends Model
{
    //rlations 
    public function questions(){
        return $this->belongsTo(Questions::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function like(){
        return $this->hasMany(Like::class);
    }

    protected $table = 'replies';

    protected $guarded = [];
}
