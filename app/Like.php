<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    protected $table = 'likes';

    // relacion MANY TO ONE
    public function user(){
        return $this->belongsTo('App\User', 'user_id');
    }

    // relacion MANY TO ONE
    public function component(){
        return $this->belongsTo('App\Component', 'component_id');
    }
}
