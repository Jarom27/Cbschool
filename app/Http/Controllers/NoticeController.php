<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notice;
use App\IPlantillaDePagina;
use App\ImagesCollection;
use App\Images;
use Illuminate\Support\Facades\Auth;
use Validator;
use Response;
use Storage;
class NoticeController extends Controller implements IPlantillaDePagina
{
    //----------------------------Propiedades o atributos-------------------------
    private $insertarNoticia;
    private $ListadoDeNoticias;//Contendra todas las noticias para la vista Notice.index
    private $insertarImagen;
    private $numeroImagenes;
    //----------------------------Metodos-----------------------------------------
    public function DarVistaListadoDeNoticias(){
        $this->ListadoDeNoticias = $this->getListadoDeNoticiasOrdenadasEnDescenso();
        return view('Notice.catalog',array('ListadoDeNoticias'=>$this->ListadoDeNoticias,"EstiloDePagina"=>$this->setEstilodeBarraDeNavegacionyFooter()));
    }

    private function getListadoDeNoticiasOrdenadasEnDescenso(){
        $ListaSinOrdenar= Notice::all();
        $ListadoOrdenadaPorFechaDeModificacion = $ListaSinOrdenar->sortByDesc('fecha');
        return $ListadoOrdenadaPorFechaDeModificacion->values()->all();
    }

    public function DarVistaDeNoticiaSeleccionada($title){
        $infonoticia=$this->ObtenerInformacionDeLaNoticiaSeleccionada($title);
        dd($infonoticia);
        $this->ObtenerNumeroDeImagenesDeLaNoticia($title);
        return view("Notice.show")->with("noticia",$infonoticia)
            ->with("ColeccionImagenes",array())
            ->with("EstiloDePagina",$this->setEstilodeBarraDeNavegacionyFooter("PlantillaDeNoticia"));
    }
    private function ObtenerInformacionDeLaNoticiaSeleccionada($title){
        return $noticiaSeleccionada= Notice::where("title","==",$title);
    }
    private function ObtenerNumeroDeImagenesDeLaNoticia($title){
        $this->numeroImagenes=\DB::select('select images_num from noticie where title = ?', [$title]);
    }
    private function DarImagenesDeLaNoticia($title,$numeroImagenes){
        $ListadoDeImagenes=new ImagesCollection($title,$numeroImagenes);
        return $ListadoDeImagenes->DarColeccionImagenes();
    }
    
    public function getVistaAdd(){
        $this->cambiarBarraNavyFooter=true;
        return view("Notice.add")->with("EstiloDePagina",$this->setEstilodeBarraDeNavegacionyFooter());
    }
    
    public function setEstilodeBarraDeNavegacionyFooter($default="default"){
        $estilo = $default;
        return $estilo;
    }
    //Estas Funciones son para Guardar Datos de noticias
    public function AlmacenarNoticia(Request $request){
        $this->EstablecerNoticia($request);
        $this->AlmacenarImagenes($request);
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
    }
    private function AlmacenarImagenes(Request $request){
        for($i=1;$i<=$this->insertarNoticia->images_num;$i++){
            $imagen = new Images();
            $imagen->EstablecerTitulo($this->insertarNoticia->title);
            $imagen->EstablecerNombre("".$i);
            $imagen->EstablecerFormato($request->file("imagen".$i)->getClientOriginalExtension());
            $imagen->AlmacenarImagen($request->file('imagen'.$i)->getRealPath());
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
