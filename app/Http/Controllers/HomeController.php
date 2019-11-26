<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Component;

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
        if(!empty($section_id)){
            // $publishedArticles = Article::all(); asi tambien funcionaria pero sin ordenarlos
            $publishedArticles = Article::orderBy('id', 'desc')
                ->where('state', 'publicado')
                ->where('section_id', $section_id)
                ->paginate(6);
            $sections = Section::orderBy('id')->get();
        } else {
            // $publishedArticles = Article::all(); asi tambien funcionaria pero sin ordenarlos
            $publishedArticles = Article::orderBy('id', 'desc')
                ->where('state', 'publicado')
//                ->where('section_id', $section_id)
                ->paginate(6);
            $sections = Section::orderBy('id')->get();
        }

        // $components = Component::all(); asi tambien funcionaria pero sin ordenarlos
        $components = Component::orderBy('id', 'desc')->paginate(5);

        return view('welcome', [
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
