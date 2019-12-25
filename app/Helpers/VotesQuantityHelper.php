<?php

namespace App\Helpers;

use Auth;
use Illuminate\Support\Facades\DB;

use App\Component;
use App\Rating;

class VotesQuantityHelper{

    static function votesQuantity($id) : int  {

        /** @var int $rated */
        $rated = Rating::where('user_id', Auth::user()->id)
            ->where('component_id', $id)
            ->count();
//dd($rated);
        return $rated;

    }


}
