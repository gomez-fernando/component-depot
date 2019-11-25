<?php

namespace App\Helpers;

use Illuminate\Support\Facades\DB;

use App\Component;

class RatingsHelper{

    static function getAverageForComponent(int $id) : int  {

        /** @var Component $component */
        $component = Component::find($id);
        $ratings = $component->ratings()->avg('value');
        return  intval($ratings);

    }


}
