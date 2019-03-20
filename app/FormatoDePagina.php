<?php
    namespace App;

    class FormatoDePagina{
        private static $DEFAULT = "default";
        private static $LOGIN = "login";
        private static $NOTICIA = "noticia";

        public static function DEFAULT(){
            return self::$DEFAULT;
        }
        public static function LOGIN(){
            return self::$LOGIN;
        }
        public static function NOTICIA(){
            return self::$NOTICIA;
        }
    }
    
?>