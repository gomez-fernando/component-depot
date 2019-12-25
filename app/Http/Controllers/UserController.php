<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Component;
use App\Category;

class userController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($search = null){
        if (!empty($search)){
            $users = User::where('sate', 'active')
                            ->where('role', 'user')
                            ->where('nick','LIKE', '%'.$search.'%')
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
        $categories = Category::orderBy('id')->get();
        return view('user.config', [
            'categories' => $categories
        ]);
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

        if($request->input('password')){
            // validacion de la contraseña
            $validate = $this->validate($request, [
                'password' => 'string|min:6|confirmed',
            ]);

        }

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
        if($request->input('password')){
            $user->password = Hash::make($request['password']);

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

    public function list(){
        if(\Auth::user()->role == 'admin'){
            $activeUsers = User::where('state', 'active')
                ->where('role', 'user')
                ->orderBy('id', 'desc')
                ->get();

            $inactiveUsers = User::where('state', 'inactive')
                ->where('role', 'user')
                ->orderBy('id', 'desc')
                ->get();

            return view('user.list', [
                'activeUsers' => $activeUsers,
                'inactiveUsers' => $inactiveUsers,
            ]);
        } else return view('home');

    }

    public function block($id){
        $user = User::find($id);

        $user->state = 'inactive';
        $user->blocked_at = date("Y-m-d H:i:s");
        if($user->update()){
            return redirect()->back()->with(['message' => 'El usuario ha sido bloqueado']);
        } else {
            return redirect()->back()->with(['message' => 'Se ha producido un error interno. Inténtelo de nuevo o contacte al servicio informático', 'status' => 'error']);
        }

    }

    public function unblock($id){
        $user = User::find($id);

        $user->state = 'active';
        $user->blocked_at = null;

        if($user->update()){
            return redirect()->back()->with(['message' => 'El usuario ha sido desbloqueado']);
        } else {
            return redirect()->back()->with(['message' => 'Se ha producido un error interno. Inténtelo de nuevo o contacte al servicio informático', 'status' => 'error']);
        }

    }


}
