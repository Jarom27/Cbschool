<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notice;
use Illuminate\Support\Facades\Auth;
use App\FormatoDePagina;
use Validator;
use Response;
use Storage;
class NoticeController extends Controller
{
    //----------------------------Propiedades o atributos-------------------------
    private $insertarNoticia;
    private $ListadoDeNoticias;//Contendra todas las noticias para la vista Notice.index
    private $insertarImagen;
    //----------------------------Metodos-----------------------------------------
    public function VistaListadoDeNoticias(){
        $this->ListadoDeNoticias = $this->getListadoDeNoticiasOrdenadasEnDescenso();
        foreach($this->ListadoDeNoticias as $noticia){
            $coleccion[$noticia["title"]]=\Storage::disk("local")->files($noticia["title"]);
        }
        return view('Notice.catalog',array('ListadoDeNoticias'=>$this->ListadoDeNoticias,
                "EstiloDePagina"=> FormatoDePagina::DEFAULT()))
                ->with("imagenes",$coleccion);
    }

    private function getListadoDeNoticiasOrdenadasEnDescenso(){
        $ListaSinOrdenar= Notice::all();
        $ListadoOrdenadaPorFechaDeModificacion = $ListaSinOrdenar->sortByDesc('fecha');
        return $ListadoOrdenadaPorFechaDeModificacion->values()->all();
    }

    public function VistaSoloUnaNoticia($title){
        $infonoticia=Notice::all()->where("title","==",$title);
        $imagenes=\Storage::disk("local")->files($title);
        return view("Notice.show")->with("noticia",$infonoticia)
            ->with("EstiloDePagina",FormatoDePagina::NOTICIA())
            ->with("Imagenes",$imagenes);
    }
   
    public function getVistaAdd(){
        return view("Notice.add")->with("EstiloDePagina",FormatoDePagina::DEFAULT());
    }
    public function getVistaEdit($title){
        $noticiaAEditar = Notice::all()->where("title","==",$title);
        return view("Notice.edit")->with("EstiloDePagina",FormatoDePagina::LOGIN())
            ->with("noticia",$noticiaAEditar);
    }
    //Estas Funciones son para Guardar Datos de noticias
    public function AlmacenarNoticia(Request $request){
        $this->EstablecerNoticia($request);
        $this->insertarNoticia->save();
        return redirect()->action("HomeController@Panel");
    }
    private function EstablecerNoticia(Request $request){
        $this->insertarNoticia = new Notice();
        $this->insertarNoticia->title = $request->input('title');
        $this->insertarNoticia->subtitle = $request->input('subtitle');
        $this->insertarNoticia->description = $request->input('description');
        $this->insertarNoticia->autor =Auth::user()->name;
        $this->insertarNoticia->fecha = date("Y-m-d H:m:s");
        $this->insertarNoticia->images_num = $request->input("num_imgs");
        for($i=1;$i<=$this->insertarNoticia->images_num;$i++){
            \Storage::put($this->insertarNoticia->title."/".$i."."
            .$request->file("imagen".$i)->getClientOriginalExtension()
            , file_get_contents($request->file("imagen".$i)));
        } 
    }
    //Fin de las noticias que guardan datos

    public function DeleteNoticiayRecursos(Request $request){
        $noticiaABorrar= Notice::where("title","=",$request->title);
        Storage::disk("local")->deleteDirectory($request->title);
        $noticiaABorrar->delete();
        return response()->json();
    }  
    public function Update(){
        //TODO: es necesario crear una funcion para poder editar las noticias usando un http request put
    }     
}
