<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Component extends Model
{
    protected $table = 'components';

    // relacion OME TO MANY
    public function comments(){
        return $this->hasMany('App\Comment')->orderBy('id', 'desc');
    }

    // relacion ONE TO MANY
    public function likes(){
        return $this->hasMany('App\Like');

    }

    // relacion ONE TO MANY
    public function ratings(){
        return $this->hasMany('App\Rating');

    }

    // relacion MANY TO ONE
    public function user(){
        return $this->belongsTo('App\User', 'user_id');
    }
}
