<?php

namespace App\Helpers;

use Illuminate\Support\Facades\DB;

use App\Component;
use App\Rating;

class RatingsHelper{

    static function getAverageForComponent($id) : int  {

        /** @var Component $component */
        $component = Component::find($id);
        if($component) {
            $ratings = $component->ratings()->avg('value');
            return  intval($ratings);
        }

        return 0;

    }

    static function getRated($id) : int{
        if(\Auth::check()){
            $rated = Rating::where('user_id', \Auth::user()->id)
                ->where('component_id', $id)
                ->count();

            return $rated;
        } else return 1;
    }

    static function ratingsQuantity($id){
        $ratingsQuantity = Rating::where('component_id', $id)
            ->count();
        return $ratingsQuantity;
    }


}
