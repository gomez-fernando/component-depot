<?php

namespace App\Http\Controllers;

use App\Rating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class RatingController extends Controller
{
    public function hello(){
        echo 'this ok222';
    }

    public function store(Request $request) {



            try {
                $status = true;
                // recoger los datos
                $user_id = $request->input('user_id');
                $component_id = $request->input('component_id');
                $value = $request->input('value');



                $rating = new Rating();
                $rating->user_id = $user_id;
                $rating->component_id = $component_id;
                $rating->value = $value;



                $rating->save();
            } catch (\Exception $e) {
                $status = false;
                return \Response::json($e->getMessage(),200);
            }

            return \Response::json($status,200);




    }

}


