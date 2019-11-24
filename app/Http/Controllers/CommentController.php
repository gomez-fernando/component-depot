<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Comment;

class commentController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function save(Request $request){

//        dd($request);

        // validacion
        $validate = $this->validate($request, [
            'component_id' => 'integer|required',
            'content' => 'string|required',

        ]);

//        dd($request);

        // recogemos los datos del formulario
        $user = Auth::user();
        $component_id = $request->input('component_id');
        $content = $request->input('content');

        // asigno  los valores al nuevo objeto
        $comment = new Comment();
        $comment->user_id = $user->id;
        $comment->component_id = $component_id;
        $comment->content = $content;

        // guardar en la db
        $comment->save();

        // redireccion
        return redirect()->route('component.detail', ['id' => $component_id])
                        ->with([
                            'message' => 'Has publicado tu comentario correctamente!!'
                        ]);
    }

    public function delete($id){

        // conseguir objeto del comentario
        $comment = Comment::find($id);

        // comprobar si es el dueño del comentario o de la publicacion
        if ($comment->delete()){


            // return redirect()->route('component.detail', ['id' => $comment->image->id])
            return redirect()->route('component.detail', ['id' => $comment->component_id])
            ->with([
                'message' => 'Comentario eliminado!!'
            ]);
        } else {
            return redirect()->route('component.detail', ['id' => $comment->image->id])
            ->with([
                'message' => 'El comentario NO se ha eliminado!!'
            ]);
        }
    }
}
