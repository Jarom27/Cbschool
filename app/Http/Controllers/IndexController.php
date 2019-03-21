<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notice;
use App\FormatoDePagina;
class IndexController extends Controller
{
    private $ListadoDeCincoNoticias;//Contiene las ultimas cinco noticias creadas
    
    public function getIndex(){
        $coleccion = array(5);
        $this->ListadoDeCincoNoticias= Notice::orderBy('fecha',"desc")->take(5)->get();//Obtiene las 5 noticias
        foreach($this->ListadoDeCincoNoticias as $noticia){
            $coleccion[$noticia["title"]]=\Storage::disk("local")->files($noticia["title"]);
        }
        return view('Index.index')->with("ListadoDeCincoNoticias",$this->ListadoDeCincoNoticias)
            ->with("EstiloDePagina",FormatoDePagina::DEFAULT())
            ->with("imagenes",$coleccion);
    }
    //Retorna la vista del acerca de
    public function getAbout(){
        return \view("Index.about")->with("EstiloDePagina",FormatoDePagina::DEFAULT());
    }
}
