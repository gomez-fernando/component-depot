<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';

    // relacion ONE TO MANY
    public function components(){
        return $this->hasMany('App\Component')->orderBy('id', 'asc');
    }

    // relacion MANY TO ONE
    public function user(){
        return $this->belongsTo('App\User', 'user_id');
    }
}
