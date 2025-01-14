<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Blog; // Adjust according to your Blog model
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $blogs = Blog::orderBy('created_at', 'desc')->paginate(6); 
        return view('home', compact('blogs'));

        //         $blogs = Blog::orderBy('created_at', 'desc')
        // ->paginate(6); 
        // return view('home', compact('blogs'));

        // $blogs = Blog::where('user_id', auth()->id())
        // ->orderBy('created_at', 'desc')
        // ->paginate(6); // Adjust the pagination as needed
        // return view('home', compact('blogs'));


        // $blogs = Blog::orderBy('created_at', 'desc')
        // ->paginate(6); // Adjust the pagination as needed
        // return view('home', compact('blogs'));
    }
}
