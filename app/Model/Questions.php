<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Model\Reply;


class Questions extends Model
{
    public function replies(){
        return $this->hasMany(Reply::class, 'question_id', 'id');
    }
    // Make Relationship 
    public function getRouteKeyName()
    {
        return 'slug';
    }
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    protected $guarded = [];

    // atribute yuntuk url
    public function getPathAttribute(){
        return asset("api/questions/$this->slug");
    }
}
