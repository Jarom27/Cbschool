<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notice;
class NoticeController extends Controller
{
    //----------------------------Propiedades o atributos-------------------------
    private $catalog;//obtiene el catalogo
    private $noticia;//obtiene una sola noticia
    private $n;//valor booleano para cambiar el nav y footer de una aplicacion
    //----------------------------Metodos-----------------------------------------

    //Este metodo se encarga de que visualicemos las noticias
    public function getCatalog(){
        $this->n=false;
        //Aqui llama a todas las noticias y las guarga en catalog
        $this->catalog= Notice::all();
        //ordena las noticias de la mas reciente a la primera
        $sorted = $this->catalog->sortByDesc('fecha');
        //Guarda todos los valores
        $sorted->values()->all();
        //Envia las noticias a la vista
        return view('Notice.catalog',array('arrayNoticias'=>$sorted,"n"=>$this->n));
    }
    public function getShow($title){
        $this->n = true;
        //Aqui se obtiene el contenido de una sola noticia en forma de arreglo
        $this->noticia= Notice::all()->where("title","==",$title);
        //Se envia la noticia a la vista show
        return view("Notice.show")->with("noticia",$this->noticia)->with("n",$this->n);
    }
    public function getAdd(){

    }
    public function Store(){
        
    }
}
