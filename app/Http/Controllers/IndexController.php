<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notice;
class IndexController extends Controller
{

    private $five;
    private $n;
    //Retorna la vista del indice
    public function getIndex(){
        $this->n=false;
        $this->five= Notice::orderBy('fecha',"desc")->take(5)->get();
        return view('Index.index')->with("five",$this->five)->with("n",$this->n);
    }
    //Retorna la vista del acerca de
    public function getAbout(){

    }
}
