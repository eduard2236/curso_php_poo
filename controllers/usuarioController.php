<?php
    class usuarioController{
        public function index(){
            echo "controlador usuarios, accion index";
        }

        public function registro(){
            include'view/usuarios/registro.php' ;
        }

        public function save(){
           if(isset($_POST)){
               var_dump($_POST);
           };
        }
    }

    
?>