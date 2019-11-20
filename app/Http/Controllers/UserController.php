<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\User;
use App\Component;

class userController extends Controller
{

    public function __construct()
    {
//        $this->middleware('auth');
    }

    public function index($search = null){
        if (!empty($search)){
            $users = User::where('nick','LIKE', '%'.$search.'%')
                            ->orWhere('name','LIKE', '%'.$search.'%')
                            ->orWhere('surname','LIKE', '%'.$search.'%')
                            ->orderBy('id', 'desc')
                            ->paginate(5);
        } else {
            $users = User::orderBy('id', 'desc')->paginate(5);
        }


        return view('user.index', [
            'users' => $users
        ]);
    }


    public function config(){
        return view('user.config');
    }

    public function update(Request $request){
        // conseguir el usuario identificado, si el usuario no está identificado hay que hacer un find es decir un select a la base de datos
        $user = \Auth::user();

        $id = $user->id;

        // validacion del formulario
        $validate = $this->validate($request, [
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'nick' => 'required|string|max:255|unique:users,nick,'.$id,
            'email' => 'required|string|email|max:255|unique:users,email, '.$id,
        ]);
        // el Auth le ponemos una barra delante por si falla al no tener ningún namespace declarado
        // recoger los datos del formulario
        $id = \Auth::user()->id;
        $name = $request->input('name');
        $surname = $request->input('surname');
        $nick = $request->input('nick');
        $email = $request->input('email');

        //setear o asignar los valores al objeto dl usuario
        $user->name = $name;
        $user->surname = $surname;
        $user->nick = $nick;
        $user->email = $email;

        // subir la imagen
        $image_path = $request->file('image_path');
        if ($image_path){
            // poner nombre unico
            $image_path_name = time().$image_path->getClientOriginalName();

            // se puede usar \Storage sin la barra delante porque eya esta cargada la dependencia antes
            // se guarda en la carpeta storage/app/users
            Storage::disk('users')->put($image_path_name, File::get($image_path));

            // seteo el nombre de la imagen en el objeto
            $user->image = $image_path_name;
        }

        //ejecutar consulta y cambios en la db
        $user->update();

        return redirect()->route('config')
                        ->with(['message'=>'Usuario actualizado correctamente']);
    }

    public function getImage($filename){
        $file = Storage::disk('users')->get($filename);
        return new Response($file, 200);
    }

    public function profile($id){
        $user = User::find($id);
        // $user = \Auth::user();

        /////////////////////////////////
        $components = Component::where('user_id', $user->id)
        ->orderBy('id', 'desc')
        ->paginate(5);
/////////////////////////////////////////////



        return view('user.profile', [
            'user' => $user,
            'components' => $components
        ]);
    }


}
