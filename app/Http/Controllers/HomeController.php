<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Component;
use App\Category;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(!empty($categoryId)){
            $components = Component::orderBy('id', 'desc')
                ->where('section_id', $categoryId)
                ->paginate(6);
            $categories = Category::orderBy('id')->get();
        } else {
            $components = Component::orderBy('id', 'desc')
//                ->where('state', 'publicado')
//                ->where('categoryId', $categoryId)
                ->paginate(6);
            $categories = Category::orderBy('id')->get();
        }

        // $components = Component::all(); asi tambien funcionaria pero sin ordenarlos
        $components = Component::orderBy('id', 'desc')->paginate(5);

        return view('welcome', [
            'categories' => $categories,
            'components' => $components
        ]);
    }

    public function home() {
        $components = Component::orderBy('id', 'desc')->paginate(5);

        return view('home', [
            'components' => $components
        ]);
    }
}
