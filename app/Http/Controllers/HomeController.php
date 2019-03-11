<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Notice;
class HomeController extends Controller
{
    private $user;
    private $notices;
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
        $this->user=Auth::user();
        return view('Home.home')->with("user",$this->user);
    }
    public function Panel(){
        //$this->notices=Notice::where("autor",Auth::user()->name)->orderBy("fecha","desc");
        //$this->notices=Notice::all()->where("autor","=","Jarom Mariscal Zozaya");
        $this->notices= \DB::table('noticie')->where("autor","=",Auth::user()->name)->orderBy('fecha',"desc")->get();
        return view('Home.panel')->with("user",$this->user)->with("lista_noticias",$this->notices);
    }
}
