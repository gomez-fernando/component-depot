<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Component;
use App\Like;
use App\Rating;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class componentController extends Controller
{
    public function __construct(){
//        $this->middleware('auth');
    }

    public function create(){
//        $categories = Category::orderBy('id', 'desc');
        $categories = DB::table('categories')
                        ->orderBy('id')
                        ->get();
//        dd($categories);

        return view('component.create', [
            'categories' => $categories
        ]);
    }

    public function save(Request $request){
//        dd($request);

        // validacion
        $validate = $this->validate($request, [
            'category' => 'required',
            'name' => 'required',
            // 'image_path' => 'required|mimes:jpg,jpeg,png,gif',
            'image_path' => 'required|image',
            'description' => 'required',
        ]);


        // recoger los datos
        $category = $request->input('category');
        $name = $request->input('name');
        $image_path = $request->file('image_path');
        $description = $request->input('description');


        //asignar valores al objeto
        // $user = \Auth::user(); si no funciona del otro modo hay que poner la barra delante de Auth
        $user = Auth::user();
        $component = new Component();
        $component->category_id = $category;
        $component->user_id = $user->id;
        $component->name = $name;
        $component->description = $description;

        // subir fichero
        if ($image_path){
            $image_path_name = time().$image_path->getClientOriginalName();
            Storage::disk('images')->put($image_path_name, File::get($image_path));
            $component->image_path = $image_path_name;
        }

        $component->save();
        return redirect()->route('home')->with([
            'message' => 'El componente ha sido guardado correctamente'
        ]);
    }

    public function getComponent($filename){
        $file = Storage::disk('images')->get($filename);
        return new Response($file, 200);
    }

    public function detail($id){
        $component = Component::find($id);
        $averageRating = \App\Helpers\RatingsHelper::getAverageForComponent($id);

        return view('component.detail', [
            'component' => $component,
            'averageRating' => $averageRating
        ]);
    }

    public function delete($id){
        $user = \Auth::user();
        $component = Component::find($id);

        $comments = Comment::where('component_id', $id)->get();
        $likes = Like::where('component_id', $id)->get();
        $ratings = Rating::where('component_id', $id)->get();

        if ($user  && $component && $component->user->id == $user->id){
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

            // eliminar ficheros de imagen del storage
            Storage::disk('images')->delete($component->image_path);

            // eliminar registro de componente en db
            $component->delete();
            $message = array('message' => 'El componente se ha borrado correctamente');

        } else{
            $message = array('message' => 'El componente NO se ha borrado');
        }

        return redirect()->route('home')->with($message);
    }

    public function edit($id){
        $user = \Auth::user();
        $component = Component::find($id);

        if ($user && $user()->role == 'admin'){
            return view('component.edit', [
                'component' => $component
            ]);
        }else{
            return redirect()->route('home');
        }
    }

    public function update(Request $request){

        // validacion
        $validate = $this->validate($request, [
            'category_id' => 'required',
            'name' => 'required',
            // 'image_path' => 'required|mimes:jpg,jpeg,png,gif',
            'image_path' => 'required|image',
            'description' => 'required',
        ]);

        // recoger los datos
        $component_id = $request->input('component_id');
        $category = $request->input('category_id');
        $name = $request->input('name');
        $image_path = $request->file('image_path');
        $description = $request->input('description');

        // conseguir objeto component
        $user = Auth::user();
        $component = Component::find($component_id);
        $component->category_id = $category;
        $component->user_id = $user->id;
        $component->name = $name;
        $component->description = $description;

        // subir fichero
        if ($image_path){
            $image_path_name = time().$image_path->getClientOriginalName();
            Storage::disk('images')->put($image_path_name, File::get($image_path));
            $component->image_path = $image_path_name;
        }

        // actualizar registro
        $component->update();
        return redirect()->route('component.detail', ['id' => $component_id])
                            ->with(['message' => 'Componente actulizado con exito']);
    }
}
