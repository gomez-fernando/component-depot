<?php

namespace App\Helpers;

use Illuminate\Support\Facades\DB;

use App\Component;

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


}
