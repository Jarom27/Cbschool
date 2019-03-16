<?php
    namespace App;

    class Images{
        private $titulo;//
        private $nombre;//Archivo
        private $formato;//png,jpg,etc

        public function Images($_title,$_name){
            $this->titulo=$_title;
            $this->nombre=$_name;
        }
        private function DarDireccionDeImagen(){
            return "storage/".$this->titulo."/".$this->nombre;
        }
        public function DarImagen(){
            return "storage/".$this->titulo."/".$this->nombre.".".$this->formato;
        }
        public function EstablecerTitulo($_title){
            $this->titulo=$_title;
        }
        public function EstablecerNombre($_name){
            $this->nombre=$_name;
        }
        public function EstablecerFormato($format=null){
            if($format!=null){
                $this->formato=$format;
            }
            else{
                $this->formato=\Storage::mimeType($this->DarDireccionDeImagen());
            } 
        }
        public function AlmacenarImagen($file){
            \Storage::disk('local')->put($this->titulo."/".$this->nombre.".".$this->formato,
            file_get_contents($file));
        }
    }

?>