<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Like;
use App\Category;

class likeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $user = \Auth::user();
        $identity = $user->id;

        $likes = Like::where('user_id', $user->id)
                            ->orderBy('id', 'desc')
                            ->paginate(5);
        $categories = Category::orderBy('id')->get();

                            /////// debug ////////////////
//                             echo ('  es igual a: ');
//                             var_dump($user->id);
//                             die();
                            /////// end debug /////////

        return view('like.index', [
            'identity' => $identity,
            'likes' => $likes,
            'categories' => $categories
        ]);
    }

    public function like($component_id){
//        dd($component_id);
        // recoger datos del usuario y el componente
        $user = \Auth::user();

        // condicion para ver si ya esxite el like y no duplicarlo
        $isset_like = Like::where('user_id', $user->id)
                            ->where('component_id', $component_id)
                            ->count();

        ///////// debug ////////////////
        // echo ('  es igual a: ');
        // var_dump($isset_like);
        // die();
        ///////// end debug /////////

        if ($isset_like == 0){
            $like = new Like();
            $like->user_id = $user->id;
            $like->component_id = (int)$component_id;

            // guardar
            $like->save();

            return response()->json([
                'like' => $like
            ]);
        } else{
            return response()->json([
                'message' => 'El like ya existe'
            ]);
        }
    }

    public function dislike($component_id){
        // recoger datos del usuario y la imagen
        $user = \Auth::user();

        // condicion para ver si ya esxite el like y no duplicarlo
        $like = Like::where('user_id', $user->id)
                            ->where('component_id', $component_id)
                            ->first();

        ///////// debug ////////////////
        // echo ('  es igual a: ');
        // var_dump($isset_like);
        // die();
        ///////// end debug /////////

        if ($like){

            // eliminar
            $like->delete();

            return response()->json([
                'like' => $like,
                'message' => 'Has dado dislike correctamente'
            ]);
        } else{
            return response()->json([
                'message' => 'El like No existe'
            ]);
        }
    }


}
