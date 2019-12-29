<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use App\Comment;
use App\Component;
use App\Like;
use App\Rating;
use App\Category;


class CategoryController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function list(){
        $categories = DB::table('categories')
            ->orderBy('id')
            ->get();
//        dd($categories);

        return view('category.list', [
            'categories' => $categories
        ]);
    }

    public function new(){
        return view('category.new');
    }

    public function save(Request $request){
//        validamos los datos
        $validate = $this->validate($request, [
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
        ]);

        // recoger los datos
        $name = $request->input('name');
        $description = $request->input('description');

//        crear category
        $category = new Category();
        $category->user_id = \Auth::user()->id;
        $category->name = $name;
        $category->description = $description;

//        guardar category

        if ($category->save()){
            $message = array('message' => 'La categoría se ha creado correctamente');
        } else {
            $message = array('message' => 'La categoría NO se ha creado correctamente');
        }


        return redirect()->route('category.list')->with($message);

    }


    public function edit($id){
        $category = Category::find($id);

        return view('category.edit', [
            'category' => $category
        ]);
    }

    public function update(Request $request){

        // validacion
        $validate = $this->validate($request, [
            'id' => 'required',
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
        ]);

        // recoger los datos
        $id = $request->input('id');
        $name = $request->input('name');
        $description = $request->input('description');

        // conseguir objeto category
        $category = Category::find($id);

//        actualizar objeto
        $category->name = $name;
        $category->description = $description;

        // actualizar registro
        $category->update();
        return redirect()->route('category.list')
            ->with(['message' => 'Categoría actualizada con exito']);
    }

    public function delete($id){
        // obtenemos la categoria
        $category = Category::find($id);

//        borramos todos los componentes de la categoria
        $componentesRelacionados = Component::where('category_id', $id)->get();

        foreach ($componentesRelacionados as $component){
            $component = Component::find($component->id);
            $comments = Comment::where('component_id', $id)->get();
            $likes = Like::where('component_id', $id)->get();
            $ratings = Rating::where('component_id', $id)->get();

            // eliminar comentarios
            if ($comments && count($comments) >= 1){
                foreach ($comments as $comment) {
                    $comment->delete();
                }
            }

            // eliminar likes
            if ($likes && count($likes) >= 1){
                foreach ($likes as $like) {
                    $like->delete();
                }
            }

            // eliminar ratings
            if ($ratings && count($ratings) >= 1){
                foreach ($ratings as $rating) {
                    $rating->delete();
                }
            }

            // eliminar registro de componente en db
            $component->delete();
//            $message = array('message' => 'El componente se ha borrado correctamente');
        }

        if ($category->delete()){
            $message = array('message' => 'La categoría se ha borrado correctamente');
        } else {
            $message = array('message' => 'La categoría NO se ha borrado correctamente');
        }


        return redirect()->route('category.list')->with($message);
    }
}
