<?php
    namespace App;
    use App\Images;
    use App\Notice;
    class ImagesCollection
    {
        private $title;
        private $numeroDeImagenes;
        private $ListadoImagenes=array();
        public function ImagesCollection($_title,$_numeroDeImagenes){
            $this->title=$_title;
            $this->numeroDeImagenes=$_numeroDeImagenes;
            $this->EstablecerColeccionImagenes();
        }
        private function EstablecerColeccionImagenes(){
            for($i=1;$i<=$this->numeroDeImagenes;$i++){
                $imagen=new Images($this->title,$i);
                $imagen->EstablecerFormato();
                $this->ListadoImagenes[$i]=$imagen;
            }
        }
        public function DarColeccionImagenes(){
            return $this->ListadoImagenes;
        }
        
    }
    


?>