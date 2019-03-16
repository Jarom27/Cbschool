<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notice;
use App\IPlantillaDePagina;

class IndexController extends Controller implements IPlantillaDePagina
{
    private $ListadoDeCincoNoticias;//Contiene las ultimas cinco noticias creadas
    
    public function getIndex(){
        $this->cambiarBarraNavyFooter=false;//El valor falso nos dice que va a ser la platilla por default
        $this->ListadoDeCincoNoticias= Notice::orderBy('fecha',"desc")->take(5)->get();//Obtiene las 5 noticias
        return view('Index.index')->with("ListadoDeCincoNoticias",$this->ListadoDeCincoNoticias)
            ->with("EstiloDePagina",$this->setEstilodeBarraDeNavegacionyFooter());
    }
    //Retorna la vista del acerca de
    public function getAbout(){

    }
    public function setEstilodeBarraDeNavegacionyFooter($default="default"){
        $estilo = $default;
        return $estilo;
    }
}
