<?php

namespace App\Http\Controllers;

use App\Rating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use App\Helpers\RatingsHelper ;

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

                // verificamos el nivel del usuario
                $userLevel = \Auth::user()->level;

                if ($userLevel == 'experto'){
                    $rating = new Rating();
                    $rating->user_id = $user_id;
                    $rating->component_id = $component_id;
                    $rating->value = $value;
                    $rating->save();

                    $rating = new Rating();
                    $rating->user_id = $user_id;
                    $rating->component_id = $component_id;
                    $rating->value = $value;
                    $rating->save();

                    $rating = new Rating();
                    $rating->user_id = $user_id;
                    $rating->component_id = $component_id;
                    $rating->value = $value;
                    $rating->save();
                } elseif ($userLevel == 'avanzado'){
                    $rating = new Rating();
                    $rating->user_id = $user_id;
                    $rating->component_id = $component_id;
                    $rating->value = $value;
                    $rating->save();

                    $rating = new Rating();
                    $rating->user_id = $user_id;
                    $rating->component_id = $component_id;
                    $rating->value = $value;
                    $rating->save();
                }else{
                    $rating = new Rating();
                    $rating->user_id = $user_id;
                    $rating->component_id = $component_id;
                    $rating->value = $value;
                    $rating->save();
                }

                $response = [
                    'status' => 200,
                    'message' => 'SUCCESS',
                    'componentId' => $component_id,
                    'value' => RatingsHelper::getAverageForComponent($component_id),
                    'ratingsQuantity' => RatingsHelper::ratingsQuantity($component_id),
                ] ;

            } catch (\Exception $e) {
                $response = ['status' => 400, 'message' => 'this fail'] ;
                return \Response::json($response,400);
            }


            return \Response::json($response,200);




    }

}


