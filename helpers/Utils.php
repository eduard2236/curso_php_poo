<?php
    class utils{
        public static function deleteSession($name){
            if(isset($_SESSION[$name])){
                $_SESSION[$name] = null;
                unset($_SESSION[$name]);
            }
            return $name;
        }

        public static function isAdmin(){
            if(!isset($_SESSION['admin'])){
                header("location:".base_url);
            }else{
                return true;
            }
        }

        public static function showCategorias(){
            require_once 'models/categoria.php';
            $categoria = new categoria();
            $categorias = $categoria->getAll();
            return $categorias;
        }
    }
?>