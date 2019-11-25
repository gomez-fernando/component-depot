<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comments';

    // relacion MANY TO ONE
    public function user(){
        return $this->belongsTo('App\User', 'user_id');
    }

    // relacion MANY TO ONE
    public function component(){
        // return $this->belongsTo('App\Component', 'user_id');
        return $this->belongsTo('App\Component', 'component_id');
    }
}
